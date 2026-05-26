<?php

// Static configuration arrays matching the indices of your candidates
$miss_votes = [142, 115, 98, 87, 76, 65, 54, 43, 32];
$mister_votes = [120, 110, 95, 88, 72, 64, 55, 41, 30];
$pairs_votes = [198, 165, 142, 110, 95, 80];

//array for Categories - used in Admin Page > Add Contestants
$categories = [
    "Miss Evening Gown",
    "Mister Urban Professional",
    "Mr. & Ms. Forces of Nature"
];

// array for Miss Evening Gown (9)
$miss = [
    "Isabella Rossi", "Cassandra Montesclaros", "Sofia Villafuerte", 
    "Adrianna Silva", "Natalia Montenegro", "Genevieve Santillan", 
    "Victoria Valdez", "Julianna Gracia", "Alessandra Pineda"
];

// array for Mister Urban Professional Wear (9)
$mister = [
    "Sebastian Thorne", "Julian Alcantara", "Dominic Sterling", 
    "Nathaniel Evangelista", "Gabriel Moretti", "Alexander Villareal", 
    "Christian Vanguardia", "Tristan Soler", "Adrian Leon"
];

// array for Mister & Miss Forces of Nature (6 pairs)
$forcesOfNature = [
    ["mister" => "Silas Thorne", "miss" => "Elena Veda"],
    ["mister" => "Caspian Reed", "miss" => "Marina Solis"],
    ["mister" => "Jasper Stone", "miss" => "Aurora Sierra"],
    ["mister" => "Kai Rivers", "miss" => "Luna Frost"],
    ["mister" => "Orion Clay", "miss" => "Iris Gaia"],
    ["mister" => "Maximilian Guerrero", "miss" => "Seraphina Castiglione"]
];


// array for Criteria List
$criteria = [
    "Poise and Stage Presence",
    "Thematic Interpretation and Creativity",
    "Overall Grooming and Aesthetic Appeal",
    "Audience Impact and Charisma"
];

// array for score
$ratings = [1, 2, 3, 4, 5];

// ---- IMAGES ----
//array for Miss Contestants IMAGES
$images_miss = [
    "ms_contestant1.jpg",
    "ms_contestant2.jpg",
    "ms_contestant3.jpg",
    "ms_contestant4.jpg",
    "ms_contestant5.jpg",
    "ms_contestant6.jpg",
    "ms_contestant7.jpg",
    "ms_contestant8.jpg",
    "ms_contestant9.jpg",
    "ms_contestant10.jpg"
    
];

//array for Mister Contestants IMAGES
$images_mister = [
    "mr_contestant1.jpg",
    "mr_contestant2.jpg",
    "mr_contestant3.jpg",
    "mr_contestant4.jpg",
    "mr_contestant5.jpg",
    "mr_contestant6.jpg",
    "mr_contestant7.jpg",
    "mr_contestant8.jpg",
    "mr_contestant9.jpg",
    "mr_contestant10.jpg"
    
];

//array for Nature Contestants IMAGES
$images_nature = [
    "nature_contestant1.jpg",
    "nature_contestant2.jpg",
    "nature_contestant3.jpg",
    "nature_contestant4.jpg",
    "nature_contestant5.jpg",
    "nature_contestant6.jpg"
    
];

// ---- LOCATIONS ----
//array for Miss LOCATIONS
$miss_locations = [
    "Angeles City/Pampanga",
    "Cebu City/Cebu",
    "Davao City/Davao del Sur",
    "Lipa City/Batangas",
    "Puerto Princesa City/Palawan",
    "Baguio City/Benguet",
    "Calamba City/Laguna",
    "Iloilo City/Iloilo",
    "Malolos City/Bulacan",
    "Cagayan de Oro City/Misamis Oriental"
];

//array for Mister LOCATIONS
$mister_locations = [
    "Antipolo City/Rizal",
    "Naga City/Camarines Sur",
    "Tagbilaran City/Bohol",
    "San Fernando City/La Union",
    "Bacolod City/Negros Occidental",
    "General Santos City/South Cotabato",
    "Tacloban City/Leyte",
    "Tagaytay City/Cavite",
    "Zamboanga City/Zamboanga del Sur",
    "Legazpi City/Albay"
];

//array for Nature LOCATIONS
$nature_locations = [
    "Vigan City/Ilocos Sur",
    "Dumaguete City/Negros Oriental",
    "Lucena City/Quezon",
    "Surigao City/Surigao del Norte",
    "Marilao City/Bulacan",
    "Tarlac City/Tarlac"
];
?>