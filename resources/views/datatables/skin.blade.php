<x-layout.default>

    <script src="/assets/js/simple-datatables.js"></script>

    <div x-data="striped">
        <div class="panel flex items-center overflow-x-auto whitespace-nowrap p-3 text-primary">
            <div class="rounded-full bg-primary p-1.5 text-white ring-2 ring-primary/30 ltr:mr-3 rtl:ml-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="h-3.5 w-3.5">
                    <path
                        d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z"
                        stroke="currentColor" stroke-width="1.5" />
                    <path opacity="0.5" d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                </svg>
            </div>
            <span class="ltr:mr-3 rtl:ml-3">Documentation: </span>
            <a href="https://www.npmjs.com/package/simple-datatables" target="_blank" class="block hover:underline">
                https://www.npmjs.com/package/simple-datatables
            </a>
        </div>
        <div class="panel mt-6">
            <h5 class="md:absolute md:top-[25px] md:mb-0 mb-5 font-semibold text-lg dark:text-white-light">Skin: Striped
            </h5>
            <table id="tableStripe" class="table-striped"></table>
        </div>

        <div class="panel mt-6">
            <h5 class="md:absolute md:top-[25px] md:mb-0 mb-5 font-semibold text-lg dark:text-white-light">Skin: Hover
            </h5>
            <table id="tableHover" class="table-hover"></table>
        </div>

        <div class="panel mt-6">
            <h5 class="md:absolute md:top-[25px] md:mb-0 mb-5 font-semibold text-lg dark:text-white-light">Skin:
                Bordered</h5>
            <table id="tableBorder" class="table-bordered"></table>
        </div>

        <div class="panel mt-6">
            <h5 class="md:absolute md:top-[25px] md:mb-0 mb-5 font-semibold text-lg dark:text-white-light">Skin: Compact
            </h5>
            <table id="tableCompact" class="table-compact"></table>
        </div>

        <div class="panel mt-6">
            <h5 class="md:absolute md:top-[25px] md:mb-0 mb-5 font-semibold text-lg dark:text-white-light">Skin: All
            </h5>
            <table id="tableAll" class="table-striped table-hover table-bordered table-compact"></table>
        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("striped", () => ({
                init() {
                    const tableOptions = {
                        data: {
                            headings: ["ID", "First Name", "Last Name", "Email", "Phone"],
                            data: [
                                [1, 'Caroline', 'Jensen', 'carolinejensen@zidant.com',
                                    '+1 (821) 447-3782'
                                ],
                                [2, 'Celeste', 'Grant', 'celestegrant@polarax.com',
                                    '+1 (838) 515-3408'
                                ],
                                [3, 'Tillman', 'Forbes', 'tillmanforbes@manglo.com',
                                    '+1 (969) 496-2892'
                                ],
                                [4, 'Daisy', 'Whitley', 'daisywhitley@applideck.com',
                                    '+1 (861) 564-2877'
                                ],
                                [5, 'Weber', 'Bowman', 'weberbowman@volax.com',
                                    '+1 (962) 466-3483'
                                ],
                                [6, 'Buckley', 'Townsend', 'buckleytownsend@orbaxter.com',
                                    '+1 (884) 595-2643'
                                ],
                                [7, 'Latoya', 'Bradshaw', 'latoyabradshaw@opportech.com',
                                    '+1 (906) 474-3155'
                                ],
                                [8, 'Kate', 'Lindsay', 'katelindsay@gorganic.com',
                                    '+1 (930) 546-2952'
                                ],
                                [9, 'Marva', 'Sandoval', 'marvasandoval@avit.com',
                                    '+1 (927) 566-3600'
                                ],
                                [10, 'Decker', 'Russell', 'deckerrussell@quilch.com',
                                    '+1 (846) 535-3283'
                                ],
                                [11, 'Odom', 'Mills', 'odommills@memora.com',
                                    '+1 (995) 525-3402'
                                ],
                                [12, 'Sellers', 'Walters', 'sellerswalters@zorromop.com',
                                    '+1 (830) 430-3157'
                                ],
                                [13, 'Wendi', 'Powers', 'wendipowers@orboid.com',
                                    '+1 (863) 457-2088'
                                ],
                                [14, 'Sophie', 'Horn', 'sophiehorn@snorus.com',
                                    '+1 (885) 418-3948'
                                ],
                                [15, 'Levine', 'Rodriquez', 'levinerodriquez@xth.com',
                                    '+1 (999) 565-3239'
                                ],
                                [16, 'Little', 'Hatfield', 'littlehatfield@comtract.com',
                                    '+1 (812) 488-3011'
                                ],
                                [17, 'Larson', 'Kelly', 'larsonkelly@zidant.com',
                                    '+1 (892) 484-2162'
                                ],
                                [18, 'Kendra', 'Molina', 'kendramolina@sureplex.com',
                                    '+1 (920) 528-3330'
                                ],
                                [19, 'Ebony', 'Livingston', 'ebonylivingston@danja.com',
                                    '+1 (970) 591-3039'
                                ],
                                [20, 'Kaufman', 'Rush', 'kaufmanrush@euron.com',
                                    '+1 (924) 463-2934'
                                ],
                                [21, 'Frank', 'Hays', 'frankhays@illumity.com',
                                    '+1 (930) 577-2670'
                                ],
                                [22, 'Carmella', 'Mccarty', 'carmellamccarty@sybixtex.com',
                                    '+1 (876) 456-3218'
                                ],
                                [23, 'Massey', 'Owen', 'masseyowen@zedalis.com',
                                    '+1 (917) 567-3786'
                                ],
                                [24, 'Lottie', 'Lowery', 'lottielowery@dyno.com',
                                    '+1 (912) 539-3498'
                                ],
                                [25, 'Addie', 'Luna', 'addieluna@multiflex.com',
                                    '+1 (962) 537-2981'
                                ],
                            ]
                        },
                        sortable: false,
                        searchable: true,
                        perPage: 10,
                        perPageSelect: [10, 20, 30, 50, 100],
                        firstLast: true,
                        firstText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        lastText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        prevText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        nextText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        labels: {
                            perPage: "{select}"
                        },
                        layout: {
                            top: "{search}",
                            bottom: "{info}{select}{pager}",
                        },
                    };

                    const datatable1 = new simpleDatatables.DataTable('#tableStripe', tableOptions);

                    const datatable2 = new simpleDatatables.DataTable('#tableHover', tableOptions);

                    const datatable3 = new simpleDatatables.DataTable('#tableBorder', tableOptions);

                    const datatable4 = new simpleDatatables.DataTable('#tableCompact', tableOptions);

                    const datatable5 = new simpleDatatables.DataTable('#tableAll', tableOptions);
                }
            }));
        });
    </script>

</x-layout.default>
