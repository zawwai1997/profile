let regionJSON = {
    type: "FeatureCollection",
    features: [
        {
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [96.1561127, 16.8052807]
            },
            properties: {
                place_name: "Yangon",
                pui: "5",
                suspected: "4",
                die: "2",
                recovered: "1",
                lab_negative: "5",
                lab_confirmed: "5",
                total_cases: "204",
                visited_places: ["place-1", "place-2"],
                townships: ["township-1", "township-2", "township-3"]
            }
        },
        {
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [96.0835876, 21.9747295]
            },
            properties: {
                place_name: "Mandalay",
                description: "lab_confirmed",
                lab_confirmed: "5",
                quarantine: "10",
                visited_places: ["place-3", "place-4"],
                townships: ["township-4", "township-5"]
            }
        },
        {
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [96.1297226, 19.7450008]
            },
            properties: {
                place_name: "Nay Pyi Taw",
                description: "lab_confirmed",
                lab_confirmed: "5",
                quarantine: "10",
                visited_places: ["place-1", "place-2"],
                townships: ["township-6", "township-7"]
            }
        },
        {
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [97.6282501, 16.4905109]
            },
            properties: {
                place_name: "Mawlamyine",
                description: "lab_confirmed",
                lab_confirmed: "5",
                quarantine: "10",
                visited_places: ["place-1", "place-2"],
                townships: ["township-8", "township-9"]
            }
        },
        {
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [96.4813538, 17.3352108]
            },
            properties: {
                place_name: "Bago",
                description: "lab_confirmed",
                lab_confirmed: "5",
                quarantine: "10",
                visited_places: ["place-1", "place-2"],
                townships: ["township-1", "township-2", "township-3"]
            }
        },
        {
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [97.0377579, 20.7891903]
            },
            properties: {
                place_name: "Shan State",
                description: "quarantine",
                lab_confirmed: "5",
                quarantine: "10",
                visited_places: ["place-1", "place-2"],
                townships: ["state-1", "state-2", "state-3"]
            }
        },
        {
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [95.2221603, 18.8246403]
            },
            properties: {
                place_name: "Pachuu",
                description: "lab_confirmed",
                lab_confirmed: "5",
                quarantine: "10",
                visited_places: ["place-1", "place-2"],
                townships: ["township-1", "township-2", "township-3"]
            }
        },
        {
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [93.6166687, 22.6499996]
            },
            properties: {
                place_name: "Tahnintharyi",
                description: "lab_confirmed",
                lab_confirmed: "5",
                quarantine: "10",
                visited_places: ["place-1", "place-2"],
                townships: ["township-1", "township-2", "township-3"]
            }
        },
        {
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [94.932457, 20.1495609]
            },
            properties: {
                place_name: "Magway",
                description: "lab_confirmed",
                lab_confirmed: "5",
                quarantine: "10",
                visited_places: ["place-1", "place-2"],
                townships: ["township-1", "township-2", "township-3"]
            }
        },
        {
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [97.3963699, 25.3832703]
            },
            properties: {
                place_name: "Myitkyina",
                description: "lab_confirmed",
                lab_confirmed: "5",
                quarantine: "10",
                visited_places: ["place-1", "place-2"],
                townships: ["township-1", "township-2", "township-3"]
            }
        }
    ]
};

let townshipJSON = {
    type: "FeatureCollection",
    features: [
        {
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [95.1561127, 17.8052807]
            },
            properties: {
                place_name: "township-1",
                description: "lab_confirmed",
                lab_confirmed: "2",
                quarantine: "8",
                visited_places: ["place-1", "place-2"],
                hospitals: ["hospital-1", "hospital-2"],
                region: "Yangon"
            }
        },
        {
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [95.561127, 18.8052807]
            },
            properties: {
                place_name: "township-2",
                description: "lab_confirmed",
                lab_confirmed: "2",
                quarantine: "8",
                visited_places: ["place-1", "place-2"],
                hospitals: ["hospital-3"],
                region: "Yangon"
            }
        },
        {
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [96.1561127, 17.0]
            },
            properties: {
                place_name: "township-3",
                description: "lab_confirmed",
                lab_confirmed: "2",
                quarantine: "8",
                visited_places: ["place-1", "place-2"],
                hospitals: ["hospital-4"],
                region: "Yangon"
            }
        },
        {
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [96.0377579, 21.0]
            },
            properties: {
                place_name: "state-1",
                description: "quarantine",
                lab_confirmed: "5",
                quarantine: "10",
                visited_places: ["place-1", "place-2"],
                hospitals: ["hospital-5"],
                region: "Shan State"
            }
        },
        {
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [90.377579, 20.7891903]
            },
            properties: {
                place_name: "state-2",
                description: "quarantine",
                lab_confirmed: "5",
                quarantine: "10",
                visited_places: ["place-1", "place-2"],
                hospitals: ["hospital-6"],
                region: "Shan State"
            }
        },
        {
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [90.0077579, 20.0891903]
            },
            properties: {
                place_name: "state-3",
                description: "quarantine",
                lab_confirmed: "5",
                quarantine: "10",
                visited_places: ["place-1", "place-2"],
                hospitals: ["hospital-7"],
                region: "Shan State"
            }
        }
    ]
};

let hospitalJSON = {
    type: "FeatureCollection",
    features: [
        {
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [95.1561127, 17.8052807]
            },
            properties: {
                place_name: "hospital-1",
                description: "lab_confirmed",
                lab_confirmed: "2",
                quarantine: "8",
                township: "township-1",
                region: "Yangon"
            }
        },
        {
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [95.1561127, 17.0052807]
            },
            properties: {
                place_name: "hospital-2",
                description: "lab_confirmed",
                lab_confirmed: "2",
                quarantine: "8",
                township: "township-1",
                region: "Yangon"
            }
        },
        {
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [95.51127, 18.852807]
            },
            properties: {
                place_name: "hospital-3",
                description: "lab_confirmed",
                lab_confirmed: "2",
                quarantine: "8",
                township: "township-2",
                region: "Yangon"
            }
        },
        {
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [95.872211, 17.005464]
            },
            properties: {
                place_name: "hospital-4",
                description: "lab_confirmed",
                lab_confirmed: "2",
                quarantine: "8",
                township: "township-3",
                region: "Yangon"
            }
        }
    ]
};