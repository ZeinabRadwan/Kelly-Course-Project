<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function showTestimonialCarousel()
{
    $people = [
        [
            'img' => "https://cdn3d.iconscout.com/3d/premium/thumb/doctora-5524618-4608696.png?f=webp", 
            'title' => "Prof. Peter Crekow", 
            'role' => "Consultant Pediatric Urologist", 
            'circle_image' => "https://www.shutterstock.com/image-vector/yellow-sun-wavy-rays-background-600nw-2450380437.jpg"
        ],
        [
            'img' => "https://cdn3d.iconscout.com/3d/premium/thumb/doctor-avatar-10107433-8179550.png?f=webp", 
            'title' => "Prof. Saber Waheeb", 
            'role' => "Professor of Pediatric Surgery", 
            'circle_image' => "https://www.shutterstock.com/image-vector/trippy-spiral-wavy-lines-background-260nw-2281604885.jpg"
        ],
        // Add more people here...
    ];

    return view('your-parent-view', compact('people'));
}
}
