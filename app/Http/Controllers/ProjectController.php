<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        // Use correct path for Hostinger (public_html/assets/projects)
        $projectDirectory = public_path('assets/projects/');
        $allProjects = [];

        if (File::exists($projectDirectory)) {
            $folders = File::directories($projectDirectory);

            // Define project names and taglines
            $taglines = [
                "Transfermate" => "Financial Services",
                "Good Energy Co" => "Financial Services",
                "Achieve More With Data" => "Financial Services",
                "APG Technology" => "Financial Services",
                "Settlement Ally" => "Legal Services",
                "Purple Fox" => "Legal Services",
                "Lead Monkey" => "Marketing & Advertising",
                "Boomerang" => "Marketing & Advertising",
                "Vuk Digital" => "Marketing & Advertising",
                "South Asian Care" => "Healthcare & Veterinary",
                "Vet Vantage" => "Healthcare & Veterinary",
                "Coach Deal" => "Sports & Recreation",
                "Dembele" => "Sports & Recreation",
                "My Tennis Wall" => "Sports & Recreation",
                "Infinite Hitting" => "Sports & Recreation",
                "Studio Rise" => "Creative & Media Services",
                "Caribbean Edit" => "Creative & Media Services",
                "Consultor" => "Consulting & Business Services",
                "AB Scaling" => "Consulting & Business Services",
                "Venture Validation Lab" => "Consulting & Business Services",
                "Adroyts" => "Technology & IT Services",
                "Scout Tek" => "Technology & IT Services",
                "Tactus" => "Technology & IT Services",
                "Axoweb" => "Technology & IT Services",
                "Theta" => "Technology & IT Services",
                "Wintelligence" => "Technology & IT Services",
                "Appush" => "Technology & IT Services",
                "Intal" => "Technology & IT Services",
                "Archer" => "Technology & IT Services",
                "Shermans Travel" => "Travel & Tourism",
                "West Yorkshire Travel" => "Travel & Tourism",
                "National Real Estate" => "Real Estate",
                "Crown Rock" => "Real Estate",
                "BLK" => "Fashion & Retail",
                "closeline" => "Fashion & Retail",
                "Chingu Store" => "Fashion & Retail",
                "Wonder Beans" => "Food & Beverage",
                "Beans" => "Food & Beverage",
                "Drink Angel" => "Food & Beverage",
                "Zesty Spices" => "Food & Beverage",
                "Weichlein" => "Manufacturing & Supply Chain",
                "ABC Supply Chain" => "Manufacturing & Supply Chain",
                "Procomm" => "Telecommunications & Utilities",
                "Elevated Plumbing" => "Telecommunications & Utilities",
                "Austral HVAC" => "Telecommunications & Utilities",
                "NEACH" => "Telecommunications & Utilities",
                "Join the Many" => "Community & Professional Organizations",
                "UPWARD" => "Community & Professional Organizations",
                "Jobsin" => "Community & Professional Organizations",
                "Nordic Hands" => "Community & Professional Organizations",
                "VVD Helmond" => "Community & Professional Organizations"
            ];

            foreach ($folders as $folder) {
                $folderName = basename($folder);
                $images = File::files($folder);

                // Find first image as thumbnail
                $thumbnail = collect($images)->first(function ($image) {
                    return in_array($image->getExtension(), ['jpg', 'jpeg', 'png', 'webp']);
                });

                // Fuzzy Matching: best tagline
                $tagline = "No tagline available"; 
                foreach ($taglines as $projectName => $projectTagline) {
                    if (stripos($folderName, $projectName) !== false) {
                        $tagline = $projectTagline;
                        break;
                    }
                }

                $allProjects[] = [
                    'name' => $folderName,
                    'slug' => urlencode($folderName),
                    'thumbnail' => $thumbnail
                        ? asset('assets/projects/' . $folderName . '/' . $thumbnail->getFilename())
                        : asset('assets/no-image.jpg'),
                    'tagline' => $tagline
                ];
            }
        }

        // 2) Collect ALL unique taglines (across all projects)
        $allUniqueTaglines = collect($allProjects)->pluck('tagline')->unique()->values()->sort();

        // 3) Check if we have a tagline filter in the query string
        $selectedTagline = $request->query('tagline', 'all'); 
        if ($selectedTagline !== 'all') {
            // Filter the entire $allProjects array to show only matching tagline
            $allProjects = array_filter($allProjects, function($p) use ($selectedTagline) {
                return $p['tagline'] === $selectedTagline;
            });
            // reindex array_filter results
            $allProjects = array_values($allProjects);
        }

        // 4) Paginate the (filtered or unfiltered) array
        $projectsCollection = collect($allProjects);
        $perPage = 9;
        $page = $request->input('page', 1);
        $offset = ($page - 1) * $perPage;
        $currentItems = $projectsCollection->slice($offset, $perPage)->values();
        
        $projectsPaginated = new LengthAwarePaginator(
            $currentItems,
            $projectsCollection->count(),
            $perPage,
            $page,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );

        // 5) Return the view with all unique taglines & the paginated results
        return view('projects', [
            'projectsPaginated' => $projectsPaginated,
            'allUniqueTaglines' => $allUniqueTaglines,
            'selectedTagline'   => $selectedTagline,
        ]);
    }

    public function show($slug)
    {
        $folderName = urldecode($slug);
        $projectPath = public_path('assets/projects/' . $folderName);

        if (!File::exists($projectPath)) {
            abort(404);
        }

        // Collect image paths
        $images = File::files($projectPath);
        $imagePaths = [];
        foreach ($images as $image) {
            if (in_array($image->getExtension(), ['jpg', 'jpeg', 'png', 'webp'])) {
                $imagePaths[] = asset('assets/projects/' . $folderName . '/' . $image->getFilename());
            }
        }

        // Load metadata from meta.json if available; otherwise, use defaults.
        $metaFile = $projectPath . '/meta.json';
        if (File::exists($metaFile)) {
            $metaData = json_decode(File::get($metaFile), true);
            $description = $metaData['description'] ?? "Default project description.";
            $review      = $metaData['review'] ?? "Default client review.";
            $clientName  = $metaData['client_name'] ?? "Default Client";
            $rating      = $metaData['client_rating'] ?? "★★★★★ (5.0)";
        } else {
            $description = "Default project description.";
            $review      = "Default client review.";
            $clientName  = "Default Client";
            $rating      = "★★★★★ (5.0)";
        }

        return view('project-details', compact(
            'folderName',
            'imagePaths',
            'description',
            'review',
            'clientName',
            'rating'
        ));
    }

}
