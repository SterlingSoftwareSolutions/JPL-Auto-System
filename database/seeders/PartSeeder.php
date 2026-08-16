<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Part;

class PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Existing rows are skipped via firstOrCreate, keyed on
     * (vehicle_id, description, part_number, component_id).
     * Re-running this seeder is fully safe and idempotent.
     */
    public function run(): void
    {
        $parts = [
            // ── Category 9 / Component 1 ─────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'RHD 67 Ford Mustang Fastback',       'part_number' => 'N/A',          'supplier_id' => 2,    'price' => '$25,000.00', 'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'Hood',                                'part_number' => '3641H',        'supplier_id' => null, 'price' => '$139.00',    'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'Hood Hinge Set (billet)',              'part_number' => '50678-1021NS', 'supplier_id' => null, 'price' => '$650.00',    'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'Hood Catch/Grille Support',           'part_number' => 'M3547A',       'supplier_id' => null, 'price' => '$24.00',     'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'Hood Latch',                          'part_number' => 'M3530C',       'supplier_id' => null, 'price' => '$38.00',     'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'Radiator Support to Hood Bumpers',    'part_number' => 'M3510',        'supplier_id' => null, 'price' => '$2.50',      'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'Fender (RH)',                         'part_number' => '3632',         'supplier_id' => null, 'price' => '$109.00',    'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'Fender (LH)',                         'part_number' => '3633',         'supplier_id' => null, 'price' => '$109.00',    'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'Front Valance',                       'part_number' => '3643',         'supplier_id' => null, 'price' => '$30.00',     'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'Headlamp Assembly (RH)',              'part_number' => 'X3698',        'supplier_id' => null, 'price' => '$132.00',    'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'Headlamp Assembly (LH)',              'part_number' => 'X3699',        'supplier_id' => null, 'price' => '$132.00',    'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'Front Stone Guard',                   'part_number' => '3643J',        'supplier_id' => null, 'price' => '$15.00',     'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'Front Bumper',                        'part_number' => '3637',         'supplier_id' => null, 'price' => '$89.00',     'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'Bumper Guards, Front',                'part_number' => '3637A',        'supplier_id' => null, 'price' => '$19.95',     'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'Rear Bumper',                         'part_number' => '3640',         'supplier_id' => null, 'price' => '$89.00',     'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'Bumper Guards, Rear',                 'part_number' => '3640BB',       'supplier_id' => null, 'price' => '$26.00',     'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'Complete Bumper Bolt Kit',            'part_number' => '3636B',        'supplier_id' => null, 'price' => '$9.75',      'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'Quarter Panel Extensions (RH)',        'part_number' => 'M3504',        'supplier_id' => null, 'price' => '$36.00',     'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'Quarter Panel Extensions (LH)',        'part_number' => 'M3505',        'supplier_id' => null, 'price' => '$36.00',     'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'BUMPER INNER ARM RH 67-68',           'part_number' => 'M3574',        'supplier_id' => null, 'price' => '$8.95',      'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'BUMPER INNER ARM LH 67-68',           'part_number' => 'M3575',        'supplier_id' => null, 'price' => '$8.95',      'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'BUMPER OUTER ARM FR RH 67-68',        'part_number' => 'M3572',        'supplier_id' => null, 'price' => '$8.95',      'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'BUMPER OUTER ARM FR LH 67-68',        'part_number' => 'M3573',        'supplier_id' => null, 'price' => '$8.95',      'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'FENDER FRONT TO BUMPER BRACKET RH',   'part_number' => 'M3570C',       'supplier_id' => null, 'price' => '$1.75',      'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'FENDER FRONT TO BUMPER BRACKET LH',   'part_number' => 'M3570D',       'supplier_id' => null, 'price' => '$1.75',      'category_id' => 9, 'component_id' => 1],
            ['vehicle_id' => 1, 'description' => 'BUMPER REAR BRACKET RH=LH 67-68 x2', 'part_number' => 'M3577',        'supplier_id' => null, 'price' => '$11.90',     'category_id' => 9, 'component_id' => 1],

            // ── Category 2 ───────────────────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'Pre Fit, Bending & Torsional Test, Final Fit', 'part_number' => 'N/A', 'supplier_id' => null, 'price' => '$7,700.00',  'category_id' => 2, 'component_id' => 2],
            ['vehicle_id' => 1, 'description' => 'Full Body Custom Colour - Grey',               'part_number' => 'N/A', 'supplier_id' => null, 'price' => '$12,100.00', 'category_id' => 2, 'component_id' => 3],
            ['vehicle_id' => 1, 'description' => 'Rear Parcel Shelf, Sterring Column Bracket',   'part_number' => 'N/A', 'supplier_id' => null, 'price' => '$3,135.00',  'category_id' => 2, 'component_id' => 4],
            ['vehicle_id' => 1, 'description' => 'Engine mOunts',                                'part_number' => 'N/A', 'supplier_id' => null, 'price' => '$1,875.00',  'category_id' => 2, 'component_id' => 5],

            // ── Category 3 ───────────────────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'ENG 5.0L 4V 412HP/390TQ',                               'part_number' => '397-M-6007-M50',        'supplier_id' => null, 'price' => '$5,890.00',  'category_id' => 3, 'component_id' => 6],
            ['vehicle_id' => 1, 'description' => 'ENG COVER 5.0L 4V',                                     'part_number' => '397-M-9680-M50',        'supplier_id' => null, 'price' => '$125.99',    'category_id' => 3, 'component_id' => 6],
            ['vehicle_id' => 1, 'description' => 'ENGINE CONTROL 5.0L 4V',                                'part_number' => '397-M-6017-A504V',      'supplier_id' => null, 'price' => '$1,443.99',  'category_id' => 3, 'component_id' => 6],
            ['vehicle_id' => 1, 'description' => 'Front Runner Drive System',                              'part_number' => '174020',                'supplier_id' => 6,    'price' => '$1,349.00',  'category_id' => 3, 'component_id' => 6],
            ['vehicle_id' => 1, 'description' => '5.0L 4V BOSS302 ALT. KIT',                              'part_number' => '397-M8600M50BALT',      'supplier_id' => null, 'price' => '$281.99',    'category_id' => 3, 'component_id' => 7],
            ['vehicle_id' => 1, 'description' => '4R70W STREET SMART PACKAGE',                             'part_number' => '732-PASS45103',         'supplier_id' => null, 'price' => '$3,879.99',  'category_id' => 3, 'component_id' => 8],
            ['vehicle_id' => 1, 'description' => 'Powermaster 9532 - Powermaster XS Torque Starter',      'part_number' => 'Powermaster#713-9532',  'supplier_id' => null, 'price' => '$295.95',    'category_id' => 3, 'component_id' => 9],
            ['vehicle_id' => 1, 'description' => 'Aeromotive 1964-68 1st Gen Mustang Stealth fuel tanks',  'part_number' => '18697',                 'supplier_id' => null, 'price' => '$649.95',    'category_id' => 3, 'component_id' => 10],
            ['vehicle_id' => 1, 'description' => 'Haymaker Evaporator System',                             'part_number' => 'HAYMAKER  + 11-2065RM', 'supplier_id' => 8,    'price' => '$1,219.00',  'category_id' => 3, 'component_id' => 11],
            ['vehicle_id' => 1, 'description' => 'Bulkhead',                                               'part_number' => 'N/A',                   'supplier_id' => null, 'price' => '0',          'category_id' => 3, 'component_id' => 11],
            ['vehicle_id' => 1, 'description' => 'VF Comodore Column + Intermitent Shaft',                 'part_number' => 'N/A',                   'supplier_id' => null, 'price' => '0',          'category_id' => 3, 'component_id' => 12],
            ['vehicle_id' => 1, 'description' => 'Lower Shft',                                             'part_number' => 'N/A',                   'supplier_id' => null, 'price' => '0',          'category_id' => 3, 'component_id' => 12],
            ['vehicle_id' => 1, 'description' => 'Upper Shaft',                                            'part_number' => 'N/A',                   'supplier_id' => 9,    'price' => '0',          'category_id' => 3, 'component_id' => 12],

            // ── Category 4 ───────────────────────────────────────────────
            ['vehicle_id' => 1, 'description' => '64-70 Mustang Rear 4-Link',                                  'part_number' => '164-RM-101-SM',    'supplier_id' => null, 'price' => '$1,195.99',  'category_id' => 4, 'component_id' => 13],
            ['vehicle_id' => 1, 'description' => 'PANHARD BAR W/ LINKS',                                       'part_number' => '164-MR-104',       'supplier_id' => null, 'price' => '0',          'category_id' => 4, 'component_id' => 13],
            ['vehicle_id' => 1, 'description' => 'Black Coil-Over Shocks (P',                                  'part_number' => '164-CO-101',       'supplier_id' => null, 'price' => '0',          'category_id' => 4, 'component_id' => 13],
            ['vehicle_id' => 1, 'description' => '9" AXLE HSG W/BRHTS STK W',                                 'part_number' => '164-RM-040-59-H',  'supplier_id' => null, 'price' => '$675.00',    'category_id' => 4, 'component_id' => 13],
            ['vehicle_id' => 1, 'description' => 'DROPPED SPINDLES 2 in. S',                                   'part_number' => '164-SP-101-K',     'supplier_id' => null, 'price' => '0',          'category_id' => 4, 'component_id' => 13],
            ['vehicle_id' => 1, 'description' => 'POSITRCATION (LSD) 3RD MEMBER 3.50 RATI (Differential)',     'part_number' => '164-BN-350-I-L',   'supplier_id' => null, 'price' => '$1,095.00',  'category_id' => 4, 'component_id' => 13],
            ['vehicle_id' => 1, 'description' => '31 SPLINE AXLES',                                            'part_number' => '164-RM-042-31',    'supplier_id' => null, 'price' => '$550.00',    'category_id' => 4, 'component_id' => 13],
            ['vehicle_id' => 1, 'description' => 'MUST IFS PKG-NO BRAKES',                                     'part_number' => '164-PX-320-E-K',   'supplier_id' => null, 'price' => '$1,821.01',  'category_id' => 4, 'component_id' => 14],
            ['vehicle_id' => 1, 'description' => 'POWER RACK RT HAND STEER',                                   'part_number' => '164-MP-038-K-RH',  'supplier_id' => null, 'price' => '$350.00',    'category_id' => 4, 'component_id' => 14],
            ['vehicle_id' => 1, 'description' => '375# SPRING & SHOCK',                                        'part_number' => '164-MP-007-375-K', 'supplier_id' => null, 'price' => '0',          'category_id' => 4, 'component_id' => 14],
            ['vehicle_id' => 1, 'description' => 'TUB CNTL ARM NARR',                                         'part_number' => '164-CA-112-N',     'supplier_id' => null, 'price' => '0',          'category_id' => 4, 'component_id' => 14],

            // ── Category 8 ───────────────────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'Wilwood', 'part_number' => 'DF-208-B',                                                            'supplier_id' => 10,   'price' => '$1,013.00',  'category_id' => 8, 'component_id' => 15],
            ['vehicle_id' => 1, 'description' => 'Wilwood', 'part_number' => 'DR-005-P-B',                                                          'supplier_id' => 10,   'price' => '$1,110.00',  'category_id' => 8, 'component_id' => 16],
            ['vehicle_id' => 1, 'description' => 'Wilwood', 'part_number' => 'WIL-340-11295/WIL-250-13167/WIL-260-10375/WIL-260-10374',             'supplier_id' => 11,   'price' => '$555.00',    'category_id' => 8, 'component_id' => 17],

            // ── Category 5 ───────────────────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'U.S. Mags Black Standard', 'part_number' => 'N/A', 'supplier_id' => null, 'price' => '$-  ',    'category_id' => 5, 'component_id' => 18],
            ['vehicle_id' => 1, 'description' => 'BF Goodrich Radial T/A',   'part_number' => 'N/A', 'supplier_id' => null, 'price' => '$553.24', 'category_id' => 5, 'component_id' => 19],

            // ── Category 6 / Component 20 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'Front', 'part_number' => 'N/A', 'supplier_id' => null, 'price' => '0', 'category_id' => 6, 'component_id' => 20],
            ['vehicle_id' => 1, 'description' => 'Rear',  'part_number' => 'N/A', 'supplier_id' => null, 'price' => '0', 'category_id' => 6, 'component_id' => 20],
            ['vehicle_id' => 1, 'description' => 'Trunk', 'part_number' => 'N/A', 'supplier_id' => null, 'price' => '0', 'category_id' => 6, 'component_id' => 20],

            // ── Category 6 / Component 21 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'Dash Pad',   'part_number' => 'PAD3B',    'supplier_id' => 12,   'price' => '$172.99', 'category_id' => 6, 'component_id' => 21],
            ['vehicle_id' => 1, 'description' => 'Guage Pod',  'part_number' => 'RM3548CB', 'supplier_id' => null, 'price' => '$150.00', 'category_id' => 6, 'component_id' => 21],
            ['vehicle_id' => 1, 'description' => 'Dash Panel', 'part_number' => 'R3625F',   'supplier_id' => null, 'price' => '$85.00',  'category_id' => 6, 'component_id' => 21],

            // ── Category 6 / Component 22 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'Wiring Harness', 'part_number' => 'INF3BOXZ/INFDSMXZ/INFMRSCZ', 'supplier_id' => 13, 'price' => '$2,031.24', 'category_id' => 6, 'component_id' => 22],

            // ── Category 6 / Component 23 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'DOOR',                     'part_number' => '3616',   'supplier_id' => null, 'price' => '$79.00',  'category_id' => 6, 'component_id' => 23],
            ['vehicle_id' => 1, 'description' => 'HINGE',                    'part_number' => '3616A',  'supplier_id' => null, 'price' => '$14.00',  'category_id' => 6, 'component_id' => 23],
            ['vehicle_id' => 1, 'description' => 'GLOVE BOX BUTTON BEZEL SS','part_number' => 'HW1607', 'supplier_id' => 12,   'price' => '$8.99',   'category_id' => 6, 'component_id' => 23],
            ['vehicle_id' => 1, 'description' => 'GLOVEBOX LATCH CATCH',     'part_number' => 'HW1600', 'supplier_id' => 12,   'price' => '$10.99',  'category_id' => 6, 'component_id' => 23],
            ['vehicle_id' => 1, 'description' => 'GLOVE BOX LATCH',          'part_number' => 'HW1663', 'supplier_id' => 12,   'price' => '$21.99',  'category_id' => 6, 'component_id' => 23],
            ['vehicle_id' => 1, 'description' => 'LINING',                   'part_number' => 'GBL4',   'supplier_id' => 12,   'price' => '$39.99',  'category_id' => 6, 'component_id' => 23],

            // ── Category 6 / Component 24 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'SUN VISOR ARM 67-68',            'part_number' => '3609B', 'supplier_id' => null, 'price' => '$12.50', 'category_id' => 6, 'component_id' => 24],
            ['vehicle_id' => 1, 'description' => '67-70 CP/FB BLACK SUNVISORS',    'part_number' => 'SV3B',  'supplier_id' => 12,   'price' => '$36.54', 'category_id' => 6, 'component_id' => 24],
            ['vehicle_id' => 1, 'description' => '65-73 RUBBER SUNVISORS TIPS (2)','part_number' => 'HW115', 'supplier_id' => 12,   'price' => '$2.39',  'category_id' => 6, 'component_id' => 24],
            ['vehicle_id' => 1, 'description' => '65-7 CP/FB SUN VISOR BRKTS.(6)','part_number' => 'F277',  'supplier_id' => 12,   'price' => '$3.99',  'category_id' => 6, 'component_id' => 24],

            // ── Category 6 / Component 25 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'MINI CONCAVE WITH INDICATOR RINGS', 'part_number' => 'RM-6506', 'supplier_id' => 8, 'price' => '$222.50', 'category_id' => 6, 'component_id' => 25],

            // ── Category 6 / Component 26 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'Emergency Brake',  'part_number' => 'N/A', 'supplier_id' => 14, 'price' => '$5.48',  'category_id' => 6, 'component_id' => 26],
            ['vehicle_id' => 1, 'description' => 'Push Start',       'part_number' => 'N/A', 'supplier_id' => 14, 'price' => '$5.48',  'category_id' => 6, 'component_id' => 26],
            ['vehicle_id' => 1, 'description' => 'Hazard',           'part_number' => 'N/A', 'supplier_id' => 14, 'price' => '$5.48',  'category_id' => 6, 'component_id' => 26],
            ['vehicle_id' => 1, 'description' => 'Rear Demist',      'part_number' => 'N/A', 'supplier_id' => 14, 'price' => '$4.55',  'category_id' => 6, 'component_id' => 26],
            ['vehicle_id' => 1, 'description' => 'A/C',              'part_number' => 'N/A', 'supplier_id' => 14, 'price' => '$4.55',  'category_id' => 6, 'component_id' => 26],
            ['vehicle_id' => 1, 'description' => 'Trunk Release',    'part_number' => 'N/A', 'supplier_id' => 14, 'price' => '$4.29',  'category_id' => 6, 'component_id' => 26],
            ['vehicle_id' => 1, 'description' => 'Hood Release',     'part_number' => 'N/A', 'supplier_id' => 14, 'price' => '$4.29',  'category_id' => 6, 'component_id' => 26],
            ['vehicle_id' => 1, 'description' => 'Door Lock',        'part_number' => 'N/A', 'supplier_id' => 15, 'price' => '$20.00', 'category_id' => 6, 'component_id' => 26],
            ['vehicle_id' => 1, 'description' => 'Window Passenger', 'part_number' => 'N/A', 'supplier_id' => 15, 'price' => '$20.00', 'category_id' => 6, 'component_id' => 26],
            ['vehicle_id' => 1, 'description' => 'Window Driver',    'part_number' => 'N/A', 'supplier_id' => 15, 'price' => '$20.00', 'category_id' => 6, 'component_id' => 26],

            // ── Category 6 / Component 27 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'Headliner',           'part_number' => 'N/A',  'supplier_id' => 16,   'price' => '$349.00', 'category_id' => 6, 'component_id' => 27],
            ['vehicle_id' => 1, 'description' => 'Door Panels',         'part_number' => 'N/A',  'supplier_id' => null, 'price' => '0',       'category_id' => 6, 'component_id' => 27],
            ['vehicle_id' => 1, 'description' => 'Kick Panels',         'part_number' => 'KP2B', 'supplier_id' => 12,   'price' => '$26.99',  'category_id' => 6, 'component_id' => 27],
            ['vehicle_id' => 1, 'description' => 'Rear Quarter Panels', 'part_number' => 'N/A',  'supplier_id' => null, 'price' => '0',       'category_id' => 6, 'component_id' => 27],
            ['vehicle_id' => 1, 'description' => 'Parcel Shelf',        'part_number' => 'N/A',  'supplier_id' => null, 'price' => '0',       'category_id' => 6, 'component_id' => 27],

            // ── Category 6 / Component 28 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'Front Seats',    'part_number' => 'N/A',    'supplier_id' => 17,   'price' => '0',       'category_id' => 6, 'component_id' => 28],
            ['vehicle_id' => 1, 'description' => 'Rear Seat Frame', 'part_number' => '3641RF', 'supplier_id' => null, 'price' => '$159.00', 'category_id' => 6, 'component_id' => 28],
            ['vehicle_id' => 1, 'description' => 'Rear Seat Foam',  'part_number' => '3641RH', 'supplier_id' => null, 'price' => '$99.00',  'category_id' => 6, 'component_id' => 28],

            // ── Category 6 / Component 29 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'Front', 'part_number' => 'N/A', 'supplier_id' => null, 'price' => '$300.00', 'category_id' => 6, 'component_id' => 29],
            ['vehicle_id' => 1, 'description' => 'Rear',  'part_number' => 'N/A', 'supplier_id' => null, 'price' => '$300.00', 'category_id' => 6, 'component_id' => 29],

            // ── Category 6 / Component 30 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'Push Button Start', 'part_number' => 'N/A', 'supplier_id' => null, 'price' => '0', 'category_id' => 6, 'component_id' => 30],
            ['vehicle_id' => 1, 'description' => 'Alarm/Immobilizer', 'part_number' => 'N/A', 'supplier_id' => null, 'price' => '0', 'category_id' => 6, 'component_id' => 30],

            // ── Category 6 / Component 31 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'E-Stopp Push Button Handbrake', 'part_number' => 'SW142100', 'supplier_id' => 19, 'price' => '$439.99', 'category_id' => 6, 'component_id' => 31],

            // ── Category 6 / Component 32 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'Hammer Shifter', 'part_number' => 'B&M 80885', 'supplier_id' => 20, 'price' => '$205.86', 'category_id' => 6, 'component_id' => 32],
            ['vehicle_id' => 1, 'description' => 'Instalation Kit', 'part_number' => 'B&M81020',  'supplier_id' => 20, 'price' => '$75.34',  'category_id' => 6, 'component_id' => 32],

            // ── Category 6 / Component 33 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'Power Locks', 'part_number' => 'AWDL-6570', 'supplier_id' => 21, 'price' => '$299.95', 'category_id' => 6, 'component_id' => 33],

            // ── Category 6 / Component 34 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'WMS Stealth Hood Pins', 'part_number' => 'WMS-SHP05M', 'supplier_id' => 22, 'price' => '$299.00', 'category_id' => 6, 'component_id' => 34],

            // ── Category 6 / Component 35 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => '67-68 FB POWER WINDOW KIT, FRONT DOORS ONLY W/O SWITCHES', 'part_number' => '67PWKC',  'supplier_id' => 12,   'price' => '$424.99', 'category_id' => 6, 'component_id' => 35],
            ['vehicle_id' => 1, 'description' => 'LH DOOR GLASS FRONT RUN CHANNEL',                          'part_number' => 'DGR3L',   'supplier_id' => 12,   'price' => '$47.99',  'category_id' => 6, 'component_id' => 35],
            ['vehicle_id' => 1, 'description' => 'RH DOOR GLASS FRONT RUN CHANNEL',                          'part_number' => 'DGR3R',   'supplier_id' => 12,   'price' => '$47.99',  'category_id' => 6, 'component_id' => 35],
            ['vehicle_id' => 1, 'description' => 'LH WINDOW REGULATOR SCISSOR CHANNEL',                      'part_number' => 'WRSC2',   'supplier_id' => 12,   'price' => '$16.79',  'category_id' => 6, 'component_id' => 35],
            ['vehicle_id' => 1, 'description' => 'RH WINDOW REGULATOR SCISSOR CHANNEL',                      'part_number' => 'WRSC2',   'supplier_id' => 12,   'price' => '$16.79',  'category_id' => 6, 'component_id' => 35],
            ['vehicle_id' => 1, 'description' => 'WINDOW GUIDE RH 67-68',                                    'part_number' => '3641FA',  'supplier_id' => null, 'price' => '$62.00',  'category_id' => 6, 'component_id' => 35],
            ['vehicle_id' => 1, 'description' => 'WINDOW GUIDE LH 67-68',                                    'part_number' => '3641FB',  'supplier_id' => null, 'price' => '$62.00',  'category_id' => 6, 'component_id' => 35],
            ['vehicle_id' => 1, 'description' => 'DOOR GLASS CHANNEL/RETAINER ASSY RH',                      'part_number' => '3614DK',  'supplier_id' => null, 'price' => '$79.00',  'category_id' => 6, 'component_id' => 35],
            ['vehicle_id' => 1, 'description' => 'DOOR GLASS CHANNEL/RETAINER ASSY LH',                      'part_number' => '3614EK',  'supplier_id' => null, 'price' => '$79.00',  'category_id' => 6, 'component_id' => 35],

            // ── Category 6 / Component 36 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'ELECTRIC REMOTE TRUNK RELEASE', 'part_number' => 'RTR2', 'supplier_id' => 12, 'price' => '$98.99', 'category_id' => 6, 'component_id' => 36],

            // ── Category 6 / Component 37 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => '67/8 TRUNK LATCH & STRIKER (5)', 'part_number' => 'F227', 'supplier_id' => 12, 'price' => '$7.19', 'category_id' => 6, 'component_id' => 37],

            // ── Category 7 / Component 38 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'Headlights',                        'part_number' => 'N/A',              'supplier_id' => null, 'price' => '0',       'category_id' => 7, 'component_id' => 38],
            ['vehicle_id' => 1, 'description' => 'Centre Brake Light',                'part_number' => 'N/A',              'supplier_id' => null, 'price' => '0',       'category_id' => 7, 'component_id' => 38],
            ['vehicle_id' => 1, 'description' => 'Tail-lights',                       'part_number' => 'MP-E6004-UB-DLX',  'supplier_id' => 23,   'price' => '$283.44', 'category_id' => 7, 'component_id' => 38],
            ['vehicle_id' => 1, 'description' => 'Tail Lamp Housing x 2',             'part_number' => '3643M',            'supplier_id' => null, 'price' => '$52.00',  'category_id' => 7, 'component_id' => 38],
            ['vehicle_id' => 1, 'description' => 'Tail Lamp Housing to Body Seal x 2','part_number' => '3643MB',           'supplier_id' => null, 'price' => '$23.00',  'category_id' => 7, 'component_id' => 38],
            ['vehicle_id' => 1, 'description' => 'Tail Lamp Bezels with Seals x 2',  'part_number' => 'L3616',            'supplier_id' => null, 'price' => '$54.00',  'category_id' => 7, 'component_id' => 38],
            ['vehicle_id' => 1, 'description' => 'Interior Lights',                   'part_number' => 'N/A',              'supplier_id' => null, 'price' => '0',       'category_id' => 7, 'component_id' => 38],
            ['vehicle_id' => 1, 'description' => 'Front turn/park LED housing lamp kit','part_number' => 'MP-1157-PK-KIT', 'supplier_id' => 23,   'price' => '$76.95',  'category_id' => 7, 'component_id' => 38],
            ['vehicle_id' => 1, 'description' => 'Fog Lights',                        'part_number' => 'MP-AUS-1157',      'supplier_id' => 23,   'price' => '$99.95',  'category_id' => 7, 'component_id' => 38],
            ['vehicle_id' => 1, 'description' => 'Front Indicators',                  'part_number' => 'As Above',         'supplier_id' => 23,   'price' => '0',       'category_id' => 7, 'component_id' => 38],
            ['vehicle_id' => 1, 'description' => 'Side Indicators',                   'part_number' => 'N/A',              'supplier_id' => null, 'price' => '0',       'category_id' => 7, 'component_id' => 38],
            ['vehicle_id' => 1, 'description' => 'Reverse Lights',                    'part_number' => 'MP-1142-RFB',      'supplier_id' => 23,   'price' => '$99.95',  'category_id' => 7, 'component_id' => 38],
            ['vehicle_id' => 1, 'description' => 'LAMP HOUSING, BACKUP RH',           'part_number' => 'L3604',            'supplier_id' => null, 'price' => '$24.00',  'category_id' => 7, 'component_id' => 38],
            ['vehicle_id' => 1, 'description' => 'LAMP HOUSING, BACKUP LH',           'part_number' => 'L3605',            'supplier_id' => null, 'price' => '$24.00',  'category_id' => 7, 'component_id' => 38],

            // ── Category 7 / Component 39 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'LH Wiper Arms',               'part_number' => '3609K', 'supplier_id' => null, 'price' => '$7.95',  'category_id' => 7, 'component_id' => 39],
            ['vehicle_id' => 1, 'description' => 'RH Wiper Arms',               'part_number' => '3609K', 'supplier_id' => null, 'price' => '$7.95',  'category_id' => 7, 'component_id' => 39],
            ['vehicle_id' => 1, 'description' => 'WIPER MOTOR TRANSMISSION ARM', 'part_number' => '3623',  'supplier_id' => null, 'price' => '$69.00', 'category_id' => 7, 'component_id' => 39],
            ['vehicle_id' => 1, 'description' => 'Wiper Motor Bracket',          'part_number' => 'WMMB2', 'supplier_id' => 12,   'price' => '$50.99', 'category_id' => 7, 'component_id' => 39],
            ['vehicle_id' => 1, 'description' => 'Wiper Motor',                  'part_number' => 'WWM2',  'supplier_id' => 12,   'price' => '$59.99', 'category_id' => 7, 'component_id' => 39],
            ['vehicle_id' => 1, 'description' => 'Wiper Pump and Bottle',        'part_number' => 'N/A',   'supplier_id' => null, 'price' => '0',      'category_id' => 7, 'component_id' => 39],

            // ── Category 7 / Component 40 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'Rear', 'part_number' => 'N/A', 'supplier_id' => null, 'price' => '0', 'category_id' => 7, 'component_id' => 40],
            ['vehicle_id' => 1, 'description' => 'Side', 'part_number' => 'N/A', 'supplier_id' => null, 'price' => '0', 'category_id' => 7, 'component_id' => 40],

            // ── Category 7 / Component 41 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'WINDSHIELD',          'part_number' => 'X3670',  'supplier_id' => null, 'price' => '$176.00', 'category_id' => 7, 'component_id' => 41],
            ['vehicle_id' => 1, 'description' => 'WINDOW/REAR',         'part_number' => 'X3671',  'supplier_id' => null, 'price' => '$176.00', 'category_id' => 7, 'component_id' => 41],
            ['vehicle_id' => 1, 'description' => 'VENT WINDOW ASSY RH', 'part_number' => '3641FD', 'supplier_id' => null, 'price' => '$359.00', 'category_id' => 7, 'component_id' => 41],
            ['vehicle_id' => 1, 'description' => 'VENT WINDOW ASSY LH', 'part_number' => '3641FE', 'supplier_id' => null, 'price' => '$359.00', 'category_id' => 7, 'component_id' => 41],
            ['vehicle_id' => 1, 'description' => 'DOOR GLASS KITS RH',  'part_number' => '3614D',  'supplier_id' => null, 'price' => '$237.00', 'category_id' => 7, 'component_id' => 41],
            ['vehicle_id' => 1, 'description' => 'DOOR GLASS KITS LH',  'part_number' => '3614E',  'supplier_id' => null, 'price' => '$237.00', 'category_id' => 7, 'component_id' => 41],

            // ── Category 7 / Component 42 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'Grille',                           'part_number' => 'M3628',  'supplier_id' => null, 'price' => '$48.00',  'category_id' => 7, 'component_id' => 42],
            ['vehicle_id' => 1, 'description' => 'Grille Support Braces',             'part_number' => 'M3637',  'supplier_id' => null, 'price' => '$23.00',  'category_id' => 7, 'component_id' => 42],
            ['vehicle_id' => 1, 'description' => 'Grille Centre Joint Molding',       'part_number' => 'M3636',  'supplier_id' => null, 'price' => '$6.50',   'category_id' => 7, 'component_id' => 42],
            ['vehicle_id' => 1, 'description' => 'Grille Molding (RH) Wide',          'part_number' => 'M3644',  'supplier_id' => null, 'price' => '$15.00',  'category_id' => 7, 'component_id' => 42],
            ['vehicle_id' => 1, 'description' => 'Grille Molding (RH) Narrow',        'part_number' => 'M3632',  'supplier_id' => null, 'price' => '$7.65',   'category_id' => 7, 'component_id' => 42],
            ['vehicle_id' => 1, 'description' => 'Grille Molding (LH) Wide',          'part_number' => 'M3645',  'supplier_id' => null, 'price' => '$15.00',  'category_id' => 7, 'component_id' => 42],
            ['vehicle_id' => 1, 'description' => 'Grille Molding (LH) Narrow',        'part_number' => 'M3633',  'supplier_id' => null, 'price' => '$7.65',   'category_id' => 7, 'component_id' => 42],
            ['vehicle_id' => 1, 'description' => 'MOLDING WINDSHIELD SET',             'part_number' => 'M3658A', 'supplier_id' => null, 'price' => '$55.00',  'category_id' => 7, 'component_id' => 42],
            ['vehicle_id' => 1, 'description' => 'MOLDING HOOD',                      'part_number' => 'M3641',  'supplier_id' => null, 'price' => '$8.30',   'category_id' => 7, 'component_id' => 42],
            ['vehicle_id' => 1, 'description' => 'MOLDING HOOD LIP',                  'part_number' => 'M3641SS','supplier_id' => null, 'price' => '$20.00',  'category_id' => 7, 'component_id' => 42],
            ['vehicle_id' => 1, 'description' => 'MOLDING WINDOW REAR SET',           'part_number' => 'M3667A', 'supplier_id' => null, 'price' => '$60.00',  'category_id' => 7, 'component_id' => 42],
            ['vehicle_id' => 1, 'description' => 'MOLDING TRUNK LID 1967-68 FASTBACK','part_number' => 'M3680',  'supplier_id' => null, 'price' => '$9.00',   'category_id' => 7, 'component_id' => 42],
            ['vehicle_id' => 1, 'description' => 'MOLDING QTR EXT RH',               'part_number' => 'M3682',  'supplier_id' => null, 'price' => '$8.00',   'category_id' => 7, 'component_id' => 42],
            ['vehicle_id' => 1, 'description' => 'MOLDING QTR EXT LH',               'part_number' => 'M3683',  'supplier_id' => null, 'price' => '$8.00',   'category_id' => 7, 'component_id' => 42],
            ['vehicle_id' => 1, 'description' => 'DOOR SCUFF PLATE',                 'part_number' => 'M3650A', 'supplier_id' => null, 'price' => '$42.00',  'category_id' => 7, 'component_id' => 42],
            ['vehicle_id' => 1, 'description' => 'DOOR EDGE GUARD',                  'part_number' => 'M3662',  'supplier_id' => null, 'price' => '$8.50',   'category_id' => 7, 'component_id' => 42],
            ['vehicle_id' => 1, 'description' => 'MOLDING DRIP RAIL',                'part_number' => 'M3649',  'supplier_id' => null, 'price' => '$39.50',  'category_id' => 7, 'component_id' => 42],

            // ── Category 7 / Component 43 ────────────────────────────────
            ['vehicle_id' => 1, 'description' => 'WINDOW GLASS RUNS',               'part_number' => '3607Q', 'supplier_id' => null, 'price' => '$16.50', 'category_id' => 7, 'component_id' => 43],
            ['vehicle_id' => 1, 'description' => '67-68 SPLASH SHIELD MOUNTING KIT','part_number' => 'HW226', 'supplier_id' => 12,   'price' => '$3.90',  'category_id' => 7, 'component_id' => 43],
            ['vehicle_id' => 1, 'description' => '67-68 LH REAR SPLASH SHIELD',     'part_number' => 'M215L', 'supplier_id' => 12,   'price' => '$19.52', 'category_id' => 7, 'component_id' => 43],
            ['vehicle_id' => 1, 'description' => '67-68 RH REAR SPLASH SHIELD',     'part_number' => 'M215R', 'supplier_id' => 12,   'price' => '$19.52', 'category_id' => 7, 'component_id' => 43],
            ['vehicle_id' => 1, 'description' => '67-68 LH FRONT SPLASH SHIELD',    'part_number' => 'M256L', 'supplier_id' => 12,   'price' => '$19.52', 'category_id' => 7, 'component_id' => 43],
            ['vehicle_id' => 1, 'description' => '67-68 RH FRONT SPLASH SHIELD',    'part_number' => 'M256R', 'supplier_id' => 12,   'price' => '$19.53', 'category_id' => 7, 'component_id' => 43],
            ['vehicle_id' => 1, 'description' => 'TRUNK WEATHERSTRIP',              'part_number' => 'WSTR17','supplier_id' => 12,   'price' => '$12.74', 'category_id' => 7, 'component_id' => 43],
            ['vehicle_id' => 1, 'description' => 'DOOR WEATHER STRIP',              'part_number' => '3608B', 'supplier_id' => null, 'price' => '$18.50', 'category_id' => 7, 'component_id' => 43],
            ['vehicle_id' => 1, 'description' => 'SEAL DOOR TO WINDOW',             'part_number' => '3607N', 'supplier_id' => null, 'price' => '$6.00',  'category_id' => 7, 'component_id' => 43],
        ];

        foreach ($parts as $part) {
            // Key uniqueness on vehicle_id + description + part_number + component_id
            // to avoid inserting the same logical row twice.
            Part::firstOrCreate(
                [
                    'vehicle_id'   => $part['vehicle_id'],
                    'description'  => $part['description'],
                    'part_number'  => $part['part_number'],
                    'component_id' => $part['component_id'],
                ],
                [
                    'category_id'       => $part['category_id'],
                    'supplier_id'       => $part['supplier_id'],
                    'price'             => $part['price'],
                    'upload_part_image' => null,
                ]
            );
        }
    }
}
