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
                "Transfermate" => "Financial",
                "Good Energy Co" => "Financial",
                "Achieve More With Data" => "Financial",
                "APG Technology" => "Financial",
                "Settlement Ally" => "Legal",
                "Purple Fox" => "Legal Services",
                "Lead Monkey" => "Marketing",
                "Boomerang" => "Marketing",
                "Vuk Digital" => "Marketing",
                "South Asian Care" => "Healthcare",
                "Vet Vantage" => "Healthcare",
                "Coach Deal" => "Sports",
                "Dembele" => "Sports",
                "My Tennis Wall" => "Sports",
                "Infinite Hitting" => "Sports",
                "Studio Rise" => "Creative",
                "Caribbean Edit" => "Creative",
                "Consultor" => "Consulting",
                "AB Scaling" => "Consulting",
                "Venture Validation Lab" => "Consulting",
                "Adroyts" => "Technology",
                "Scout Tek" => "Technology",
                "Tactus" => "Technology",
                "Axoweb" => "Technology",
                "Theta" => "Technology",
                "Wintelligence" => "Technology",
                "Appush" => "Technology",
                "Intal" => "Technology",
                "Archer" => "Technology",
                "Shermans Travel" => "Travel",
                "West Yorkshire Travel" => "Travel",
                "National RealEstate" => "RealEstate",
                "Crown Rock" => "RealEstate",
                "BLK" => "Fashion",
                "closeline" => "Fashion",
                "Chingu Store" => "Fashion",
                "Wonder Beans" => "Food",
                "Beans" => "Food",
                "Drink Angel" => "Food",
                "Zesty Spices" => "Food",
                "Weichlein" => "Manufacturing",
                "ABC Supply Chain" => "Manufacturing",
                "Procomm" => "Telecom",
                "Elevated Plumbing" => "Telecom",
                "Austral HVAC" => "Telecom",
                "NEACH" => "Telecom",
                "Join the Many" => "Community",
                "UPWARD" => "Community",
                "Jobsin" => "Community",
                "Nordic Hands" => "Community",
                "VVD Helmond" => "Community"
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
        $perPage = 10;
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
