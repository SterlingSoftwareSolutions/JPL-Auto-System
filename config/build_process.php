<?php

return [
    [
        'name' => 'Body Shell',
        'ops' => [
            [
                'code' => 'OP-101', 'section' => 'Body Shell', 'station' => 'Receiving Bay',
                'title' => 'New Body Shell Receiving, Inspection & Fixture Check',
                'ppe' => ['Safety Glasses','Gloves','Steel-Cap Boots'],
                'hazards' => [
                    ['h' => 'Manual handling of shell/panels', 'c' => 'Two-plus person lift or hoist for shell; use body cart/rotisserie once landed.'],
                    ['h' => 'Shell on stands — stability', 'c' => 'Confirm stands/fixture rated for shell weight before releasing hoist.'],
                ],
                'tools' => ['Body cart / rotisserie','Dimensional check fixture / tape','Inspection light','Camera'],
                'materials' => ['Dynacorn shell spec sheet'],
                'steps' => [
                    ['label' => 'Uncrate and inspect the new Dynacorn reproduction shell for shipping damage, panel alignment and e-coat/paint condition.', 'warn' => 'No teardown required — shell arrives as new sheet metal, not a restored body.'],
                    ['label' => 'Mount shell on rotisserie or chassis fixture; confirm level and square before any structural work begins.'],
                    ['label' => 'Dimensional check against spec sheet at all reference points.'],
                    ['label' => 'Confirm panel gaps and alignment across doors, decklid and fenders.'],
                ],
            ]
        ]
    ],
    [
        'name' => 'Chassis — Rear',
        'ops' => [
            [
                'code' => 'OP-201', 'section' => 'Chassis — Rear', 'station' => 'Chassis Bay',
                'title' => 'Rear 4-Link and Panhard Bar Installation',
                'ppe' => ['Safety Glasses','Gloves'],
                'hazards' => [
                    ['h' => 'Suspension under load during fitment', 'c' => 'Support on stands; never work under a hoisted, unsecured chassis.'],
                ],
                'tools' => ['Torque wrench','Chassis stands'],
                'materials' => ['Rear 4-link kit spec sheet'],
                'steps' => [
                    ['label' => 'Fit rear 4-link mounts to chassis rails.'],
                    ['label' => 'Install panhard bar bracket.'],
                    ['label' => 'Torque check all mounting points to spec.'],
                ],
            ]
        ]
    ],
    [
        'name' => 'Front IFS',
        'ops' => [
            [
                'code' => 'OP-301', 'section' => 'Front IFS', 'station' => 'Chassis Bay',
                'title' => 'Front Independent Suspension Installation',
                'ppe' => ['Safety Glasses','Gloves'],
                'hazards' => [
                    ['h' => 'Crossmember handling', 'c' => 'Two-person lift; secure on stand before fitting.'],
                ],
                'tools' => ['Torque wrench','Alignment gauge'],
                'materials' => [],
                'steps' => [
                    ['label' => 'Install front IFS crossmember.'],
                    ['label' => 'Fit power rack and steering linkage.'],
                    ['label' => 'Align and torque to spec.'],
                ],
            ]
        ]
    ],
    [
        'name' => 'Rear Suspension',
        'ops' => [
            [
                'code' => 'OP-401', 'section' => 'Rear Suspension', 'station' => 'Chassis Bay',
                'title' => 'Rear Spring and Shock Fitment',
                'ppe' => ['Safety Glasses','Gloves'],
                'hazards' => [
                    ['h' => 'Spring compression', 'c' => 'Use rated spring compressor; never hand-force a loaded spring.'],
                ],
                'tools' => ['Spring compressor','Torque wrench'],
                'materials' => [],
                'steps' => [
                    ['label' => 'Fit rear springs and shocks.'],
                    ['label' => 'Torque all mounting hardware to spec.'],
                ],
            ]
        ]
    ],
    [
        'name' => 'Brakes & Fuel',
        'ops' => [
            [
                'code' => 'OP-501', 'section' => 'Brakes & Fuel', 'station' => 'Chassis Bay',
                'title' => 'Wilwood Brake and Fuel System Installation',
                'ppe' => ['Safety Glasses','Gloves'],
                'hazards' => [
                    ['h' => 'Brake fluid contact', 'c' => 'Wear gloves; wipe spills immediately, avoid contact with paint.'],
                ],
                'tools' => ['Brake bleeding kit','Torque wrench'],
                'materials' => ['Aeromotive fuel tank spec sheet'],
                'steps' => [
                    ['label' => 'Install Wilwood brake calipers and rotors, front and rear.'],
                    ['label' => 'Fit Aeromotive fuel tank and lines.'],
                    ['label' => 'Bleed brake system and pressure test.'],
                ],
            ]
        ]
    ],
    [
        'name' => 'Drivetrain',
        'ops' => [
            [
                'code' => 'OP-601', 'section' => 'Drivetrain', 'station' => 'Engine Bay',
                'title' => 'Coyote Engine and Transmission Installation',
                'ppe' => ['Safety Glasses','Gloves','Steel-Cap Boots'],
                'hazards' => [
                    ['h' => 'Engine hoist operation', 'c' => 'Rated hoist only; clear the swing area before lifting.'],
                ],
                'tools' => ['Engine hoist','Torque wrench'],
                'materials' => ['4R70W install spec sheet'],
                'steps' => [
                    ['label' => 'Mount 5.0L Coyote engine on chassis.'],
                    ['label' => 'Install 4R70W transmission.'],
                    ['label' => 'Connect driveline and torque all mounts.'],
                ],
            ]
        ]
    ],
    [
        'name' => 'Electrical',
        'ops' => [
            [
                'code' => 'OP-701', 'section' => 'Electrical', 'station' => 'Electrical Bay',
                'title' => 'Haltech ECU and Wiring Harness Installation',
                'ppe' => ['Safety Glasses'],
                'hazards' => [
                    ['h' => 'Battery connected during wiring', 'c' => 'Disconnect battery before harness work.'],
                ],
                'tools' => ['Multimeter','Crimp tool'],
                'materials' => ['Wiring diagram'],
                'steps' => [
                    ['label' => 'Install Haltech ECU and engine harness.'],
                    ['label' => 'Wire digital dash and gauge cluster.'],
                    ['label' => 'Function test all circuits before reassembly.'],
                ],
            ]
        ]
    ],
    [
        'name' => 'Paint & Body',
        'ops' => [
            [
                'code' => 'OP-801', 'section' => 'Paint & Body', 'station' => 'Paint Bay',
                'title' => 'Final Panel Fit and Paint Preparation',
                'ppe' => ['Respirator','Gloves'],
                'hazards' => [
                    ['h' => 'Paint booth fumes', 'c' => 'Respirator required; ensure booth extraction is running.'],
                ],
                'tools' => ['Panel gap gauge'],
                'materials' => [],
                'steps' => [
                    ['label' => 'Confirm final panel gaps prior to paint.'],
                    ['label' => 'Mask and prep for customer-specified colour.'],
                ],
            ]
        ]
    ],
    [
        'name' => 'Trim & Glass',
        'ops' => [
            [
                'code' => 'OP-901', 'section' => 'Trim & Glass', 'station' => 'Trim Bay',
                'title' => 'Interior Trim and Glass Fitment',
                'ppe' => ['Gloves'],
                'hazards' => [
                    ['h' => 'Glass handling', 'c' => 'Two-person lift for all glass; use suction handles.'],
                ],
                'tools' => ['Trim tools','Glass install kit'],
                'materials' => [],
                'steps' => [
                    ['label' => 'Fit custom interior trim per customer specification.'],
                    ['label' => 'Install windscreen and door glass.'],
                ],
            ]
        ]
    ],
    [
        'name' => 'Commissioning',
        'ops' => [
            [
                'code' => 'OP-1001', 'section' => 'Commissioning', 'station' => 'Commissioning Bay',
                'title' => 'Final Commissioning and Road Test',
                'ppe' => ['Safety Glasses'],
                'hazards' => [
                    ['h' => 'Road test of uncommissioned vehicle', 'c' => 'Complete full pre-drive checklist before any road test.'],
                ],
                'tools' => ['Diagnostic scanner'],
                'materials' => [],
                'steps' => [
                    ['label' => 'Complete full systems check against build sheet.'],
                    ['label' => 'Road test and confirm no faults.'],
                    ['label' => 'Sign off ready for VIN assignment.'],
                ],
            ]
        ]
    ],
];
