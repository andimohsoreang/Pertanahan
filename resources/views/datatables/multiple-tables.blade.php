<x-layout.default>


    <script src="/assets/js/simple-datatables.js"></script>

    <div x-data="multipleTable">
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
            <h5 class="md:absolute md:top-[25px] md:mb-0 mb-5 font-semibold text-lg dark:text-white-light">Table 1</h5>
            <table id="myTable1" class="whitespace-nowrap"></table>
        </div>
        <div class="panel mt-6">
            <h5 class="md:absolute md:top-[25px] md:mb-0 mb-5 font-semibold text-lg dark:text-white-light">Table 2</h5>
            <table id="myTable2" class="whitespace-nowrap"></table>
        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("multipleTable", () => ({
                datatable1: null,
                datatable2: null,
                init() {
                    this.datatable1 = new simpleDatatables.DataTable('#myTable1', {
                        data: {
                            headings: ['Name', 'Company', 'Age', 'Start Date', 'Email',
                                'Phone No.', 'Status',
                                '<div class="text-center">Action</div>'
                            ],
                            data: [
                                ['Caroline Jensen', 'POLARAX', 39, '2004-05-28',
                                    'carolinejensen@zidant.com', '+1 (821) 447-3782', '', ''
                                ],
                                ['Celeste Grant', 'MANGLO', 32, '1989-11-19',
                                    'celestegrant@polarax.com', '+1 (838) 515-3408', '', ''
                                ],
                                ['Tillman Forbes', 'APPLIDECK', 26, '2016-09-05',
                                    'tillmanforbes@manglo.com', '+1 (969) 496-2892', '', ''
                                ],
                                ['Daisy Whitley', 'VOLAX', 21, '1987-03-23',
                                    'daisywhitley@applideck.com', '+1 (861) 564-2877', '',
                                    ''
                                ],
                                ['Weber Bowman', 'ORBAXTER', 26, '1983-02-24',
                                    'weberbowman@volax.com', '+1 (962) 466-3483', '', ''
                                ],
                                ['Buckley Townsend', 'OPPORTECH', 40, '2011-05-29',
                                    'buckleytownsend@orbaxter.com', '+1 (884) 595-2643', '',
                                    ''
                                ],
                                ['Latoya Bradshaw', 'GORGANIC', 24, '2010-11-23',
                                    'latoyabradshaw@opportech.com', '+1 (906) 474-3155', '',
                                    ''
                                ],
                                ['Kate Lindsay', 'AVIT', 24, '1987-07-02',
                                    'katelindsay@gorganic.com', '+1 (930) 546-2952', '', ''
                                ],
                                ['Marva Sandoval', 'QUILCH', 28, '2010-11-02',
                                    'marvasandoval@avit.com', '+1 (927) 566-3600', '', ''
                                ],
                                ['Decker Russell', 'MEMORA', 27, '1994-04-21',
                                    'deckerrussell@quilch.com', '+1 (846) 535-3283', '', ''
                                ],
                                ['Odom Mills', 'ZORROMOP', 34, '2010-01-24',
                                    'odommills@memora.com', '+1 (995) 525-3402', '', ''
                                ],
                                ['Sellers Walters', 'ORBOID', 28, '1975-11-12',
                                    'sellerswalters@zorromop.com', '+1 (830) 430-3157', '',
                                    ''
                                ],
                                ['Wendi Powers', 'SNORUS', 31, '1979-06-02',
                                    'wendipowers@orboid.com', '+1 (863) 457-2088', '', ''
                                ],
                                ['Sophie Horn', 'XTH', 22, '2018-09-20',
                                    'sophiehorn@snorus.com', '+1 (885) 418-3948', '', ''
                                ],
                                ['Levine Rodriquez', 'COMTRACT', 27, '1973-02-08',
                                    'levinerodriquez@xth.com', '+1 (999) 565-3239', '', ''
                                ],
                                ['Little Hatfield', 'ZIDANT', 33, '2012-01-03',
                                    'littlehatfield@comtract.com', '+1 (812) 488-3011', '',
                                    ''
                                ],
                                ['Larson Kelly', 'SUREPLEX', 20, '2010-06-14',
                                    'larsonkelly@zidant.com', '+1 (892) 484-2162', '', ''
                                ],
                                ['Kendra Molina', 'DANJA', 31, '2002-07-19',
                                    'kendramolina@sureplex.com', '+1 (920) 528-3330', '', ''
                                ],
                                ['Ebony Livingston', 'EURON', 33, '1994-10-18',
                                    'ebonylivingston@danja.com', '+1 (970) 591-3039', '', ''
                                ],
                                ['Kaufman Rush', 'ILLUMITY', 39, '2011-07-10',
                                    'kaufmanrush@euron.com', '+1 (924) 463-2934', '', ''
                                ],
                                ['Frank Hays', 'SYBIXTEX', 31, '2005-06-15',
                                    'frankhays@illumity.com', '+1 (930) 577-2670', '', ''
                                ],
                                ['Carmella Mccarty', 'ZEDALIS', 21, '1980-03-06',
                                    'carmellamccarty@sybixtex.com', '+1 (876) 456-3218', '',
                                    ''
                                ],
                                ['Massey Owen', 'DYNO', 40, '2012-03-01',
                                    'masseyowen@zedalis.com', '+1 (917) 567-3786', '', ''
                                ],
                                ['Lottie Lowery', 'MULTIFLEX', 36, '1982-10-10',
                                    'lottielowery@dyno.com', '+1 (912) 539-3498', '', ''
                                ],
                                ['Addie Luna', 'PHARMACON', 32, '1988-05-01',
                                    'addieluna@multiflex.com', '+1 (962) 537-2981', '', ''
                                ],
                            ]
                        },
                        searchable: true,
                        perPage: 10,
                        perPageSelect: [10, 20, 30, 50, 100],
                        columns: [{
                                select: 0,
                                render: (data, cell, row) => {
                                    return `<div class="flex items-center w-max"><img class="w-9 h-9 rounded-full ltr:mr-2 rtl:ml-2 object-cover" src="/assets/images/profile-${row.dataIndex + 1}.jpeg" />${data}</div>`;
                                },
                                sort: "asc"
                            },
                            {
                                select: 3,
                                render: (data, cell, row) => {
                                    return this.formatDate(data);
                                },
                            },
                            {
                                select: 6,
                                render: (data, cell, row) => {
                                    return '<span class="badge bg-' + this
                                    .randomColor() + '">' + this.randomStatus() +
                                        '</span>';
                                },
                            },
                            {
                                select: 7,
                                sortable: false,
                                render: (data, cell, row) => {
                                    return '<div class="text-center"><button type="button" x-tooltip="Delete"> <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"> <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" /> <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> </svg> </button></div>';
                                },
                            }
                        ],
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
                    });

                    this.datatable2 = new simpleDatatables.DataTable('#myTable2', {
                        data: {
                            headings: ['Name', 'Progress', 'Company', 'Start Date', 'Email',
                                'Phone No.', 'Action'
                            ],
                            data: [
                                ['Caroline Jensen', 39, 'POLARAX', '2004-05-28',
                                    'carolinejensen@zidant.com', '+1 (821) 447-3782', ''
                                ],
                                ['Celeste Grant', 32, 'MANGLO', '1989-11-19',
                                    'celestegrant@polarax.com', '+1 (838) 515-3408', ''
                                ],
                                ['Tillman Forbes', 26, 'APPLIDECK', '2016-09-05',
                                    'tillmanforbes@manglo.com', '+1 (969) 496-2892', ''
                                ],
                                ['Daisy Whitley', 21, 'VOLAX', '1987-03-23',
                                    'daisywhitley@applideck.com', '+1 (861) 564-2877', ''
                                ],
                                ['Weber Bowman', 26, 'ORBAXTER', '1983-02-24',
                                    'weberbowman@volax.com', '+1 (962) 466-3483', ''
                                ],
                                ['Buckley Townsend', 40, 'OPPORTECH', '2011-05-29',
                                    'buckleytownsend@orbaxter.com', '+1 (884) 595-2643', ''
                                ],
                                ['Latoya Bradshaw', 24, 'GORGANIC', '2010-11-23',
                                    'latoyabradshaw@opportech.com', '+1 (906) 474-3155', ''
                                ],
                                ['Kate Lindsay', 24, 'AVIT', '1987-07-02',
                                    'katelindsay@gorganic.com', '+1 (930) 546-2952', ''
                                ],
                                ['Marva Sandoval', 28, 'QUILCH', '2010-11-02',
                                    'marvasandoval@avit.com', '+1 (927) 566-3600', ''
                                ],
                                ['Decker Russell', 27, 'MEMORA', '1994-04-21',
                                    'deckerrussell@quilch.com', '+1 (846) 535-3283', ''
                                ],
                                ['Odom Mills', 34, 'ZORROMOP', '2010-01-24',
                                    'odommills@memora.com', '+1 (995) 525-3402', ''
                                ],
                                ['Sellers Walters', 28, 'ORBOID', '1975-11-12',
                                    'sellerswalters@zorromop.com', '+1 (830) 430-3157', ''
                                ],
                                ['Wendi Powers', 31, 'SNORUS', '1979-06-02',
                                    'wendipowers@orboid.com', '+1 (863) 457-2088', ''
                                ],
                                ['Sophie Horn', 22, 'XTH', '2018-09-20',
                                    'sophiehorn@snorus.com', '+1 (885) 418-3948', ''
                                ],
                                ['Levine Rodriquez', 27, 'COMTRACT', '1973-02-08',
                                    'levinerodriquez@xth.com', '+1 (999) 565-3239', ''
                                ],
                                ['Little Hatfield', 33, 'ZIDANT', '2012-01-03',
                                    'littlehatfield@comtract.com', '+1 (812) 488-3011', ''
                                ],
                                ['Larson Kelly', 20, 'SUREPLEX', '2010-06-14',
                                    'larsonkelly@zidant.com', '+1 (892) 484-2162', ''
                                ],
                                ['Kendra Molina', 31, 'DANJA', '2002-07-19',
                                    'kendramolina@sureplex.com', '+1 (920) 528-3330', ''
                                ],
                                ['Ebony Livingston', 33, 'EURON', '1994-10-18',
                                    'ebonylivingston@danja.com', '+1 (970) 591-3039', ''
                                ],
                                ['Kaufman Rush', 39, 'ILLUMITY', '2011-07-10',
                                    'kaufmanrush@euron.com', '+1 (924) 463-2934', ''
                                ],
                                ['Frank Hays', 31, 'SYBIXTEX', '2005-06-15',
                                    'frankhays@illumity.com', '+1 (930) 577-2670', ''
                                ],
                                ['Carmella Mccarty', 21, 'ZEDALIS', '1980-03-06',
                                    'carmellamccarty@sybixtex.com', '+1 (876) 456-3218', ''
                                ],
                                ['Massey Owen', 40, 'DYNO', '2012-03-01',
                                    'masseyowen@zedalis.com', '+1 (917) 567-3786', ''
                                ],
                                ['Lottie Lowery', 36, 'MULTIFLEX', '1982-10-10',
                                    'lottielowery@dyno.com', '+1 (912) 539-3498', ''
                                ],
                                ['Addie Luna', 32, 'PHARMACON', '1988-05-01',
                                    'addieluna@multiflex.com', '+1 (962) 537-2981', ''
                                ],
                            ]
                        },
                        searchable: true,
                        perPage: 10,
                        perPageSelect: [10, 20, 30, 50, 100],
                        columns: [{
                                select: 0,
                                render: (data, cell, row) => {
                                    return `<div class="flex items-center w-max"><img class="w-9 h-9 rounded-full ltr:mr-2 rtl:ml-2 object-cover" src="/assets/images/profile-${row.dataIndex + 1}.jpeg" />${data}</div>`;
                                },
                                sort: "asc"
                            },
                            {
                                select: 1,
                                sortable: false,
                                render: (data, cell, row) => {
                                    return `<div class="w-4/5 min-w-[100px] h-2.5 bg-[#ebedf2] dark:bg-dark/40 rounded-full flex"> <div class="bg-${this.randomColor()} h-2.5 rounded-full rounded-bl-full text-center text-white text-xs" style="width:${data}%"></div> </div>`;
                                },
                            },
                            {
                                select: 3,
                                render: (data, cell, row) => {
                                    return this.formatDate(data);
                                },
                            },
                            {
                                select: 6,
                                sortable: false,
                                render: (data, cell, row) => {
                                    return `<div class="flex items-center">
                                            <button type="button" class="ltr:mr-2 rtl:ml-2" x-tooltip="Edit">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5">
                                                    <path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor" stroke-width="1.5" />
                                                    <path opacity="0.5" d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015" stroke="currentColor" stroke-width="1.5" />
                                                </svg>
                                            </button>
                                            <button type="button" x-tooltip="Delete">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                                    <path opacity="0.5" d="M9.17065 4C9.58249 2.83481 10.6937 2 11.9999 2C13.3062 2 14.4174 2.83481 14.8292 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                            </button>
                                        </div>`;
                                },
                            }
                        ],
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
                    });
                },

                formatDate(date) {
                    if (date) {
                        const dt = new Date(date);
                        const month = dt.getMonth() + 1 < 10 ? '0' + (dt.getMonth() + 1) : dt
                        .getMonth() + 1;
                        const day = dt.getDate() < 10 ? '0' + dt.getDate() : dt.getDate();
                        return day + '/' + month + '/' + dt.getFullYear();
                    }
                    return '';
                },

                randomColor() {
                    const color = ['primary', 'secondary', 'success', 'danger', 'warning', 'info'];
                    const random = Math.floor(Math.random() * color.length);
                    return color[random];
                },

                randomStatus() {
                    const status = ['PAID', 'APPROVED', 'FAILED', 'CANCEL', 'SUCCESS', 'PENDING',
                        'COMPLETE'
                    ];
                    const random = Math.floor(Math.random() * status.length);
                    return status[random];
                }
            }));
        });
    </script>


</x-layout.default>
