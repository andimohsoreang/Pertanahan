<x-layout.default>


    <script src="/assets/js/simple-datatables.js"></script>

    <div x-data="custom">
        <div class="space-y-6">
            <div class="panel flex items-center overflow-x-auto whitespace-nowrap p-3 text-primary">
                <div class="rounded-full bg-primary p-1.5 text-white ring-2 ring-primary/30 ltr:mr-3 rtl:ml-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="h-3.5 w-3.5">
                        <path
                            d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z"
                            stroke="currentColor" stroke-width="1.5" />
                        <path opacity="0.5"
                            d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </div>
                <span class="ltr:mr-3 rtl:ml-3">Documentation: </span>
                <a href="https://www.npmjs.com/package/simple-datatables" target="_blank" class="block hover:underline">
                    https://www.npmjs.com/package/simple-datatables
                </a>
            </div>
            <div class="panel sticky-header">
                <h5 class="md:absolute md:top-[25px] md:mb-0 mb-5 font-semibold text-lg dark:text-white-light">Sticky
                    Header</h5>
                <table id="myTable1" class="whitespace-nowrap table-checkbox table-striped table-hover"></table>
            </div>

            <div class="panel sticky-column">
                <h5 class="md:absolute md:top-[25px] md:mb-0 mb-5 font-semibold text-lg dark:text-white-light">Sticky
                    First Column</h5>
                <table id="myTable2" class="whitespace-nowrap table-checkbox table-striped table-hover"></table>
            </div>

            <div class="panel sticky-column sticky-header">
                <h5 class="md:absolute md:top-[25px] md:mb-0 mb-5 font-semibold text-lg dark:text-white-light">Sticky
                    Header & First Column</h5>
                <table id="myTable3" class="whitespace-nowrap table-checkbox table-striped table-hover"></table>
            </div>
        </div>
    </div>
    <style>
        table.table-checkbox thead tr th:first-child {
            width: 1px !important;
        }
    </style>
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("custom", () => ({
                ids1: [],
                datatable1: null,
                tableData1: [
                    [1, 1, 'Caroline', 'Jensen', 'carolinejensen@zidant.com', '+1 (821) 447-3782'],
                    [2, 2, 'Celeste', 'Grant', 'celestegrant@polarax.com', '+1 (838) 515-3408'],
                    [3, 3, 'Tillman', 'Forbes', 'tillmanforbes@manglo.com', '+1 (969) 496-2892'],
                    [4, 4, 'Daisy', 'Whitley', 'daisywhitley@applideck.com', '+1 (861) 564-2877'],
                    [5, 5, 'Weber', 'Bowman', 'weberbowman@volax.com', '+1 (962) 466-3483'],
                    [6, 6, 'Buckley', 'Townsend', 'buckleytownsend@orbaxter.com',
                        '+1 (884) 595-2643'
                    ],
                    [7, 7, 'Latoya', 'Bradshaw', 'latoyabradshaw@opportech.com',
                        '+1 (906) 474-3155'
                    ],
                    [8, 8, 'Kate', 'Lindsay', 'katelindsay@gorganic.com', '+1 (930) 546-2952'],
                    [9, 9, 'Marva', 'Sandoval', 'marvasandoval@avit.com', '+1 (927) 566-3600'],
                    [10, 10, 'Decker', 'Russell', 'deckerrussell@quilch.com', '+1 (846) 535-3283'],
                    [11, 11, 'Odom', 'Mills', 'odommills@memora.com', '+1 (995) 525-3402'],
                    [12, 12, 'Sellers', 'Walters', 'sellerswalters@zorromop.com',
                        '+1 (830) 430-3157'
                    ],
                    [13, 13, 'Wendi', 'Powers', 'wendipowers@orboid.com', '+1 (863) 457-2088'],
                    [14, 14, 'Sophie', 'Horn', 'sophiehorn@snorus.com', '+1 (885) 418-3948'],
                    [15, 15, 'Levine', 'Rodriquez', 'levinerodriquez@xth.com', '+1 (999) 565-3239'],
                    [16, 16, 'Little', 'Hatfield', 'littlehatfield@comtract.com',
                        '+1 (812) 488-3011'
                    ],
                    [17, 17, 'Larson', 'Kelly', 'larsonkelly@zidant.com', '+1 (892) 484-2162'],
                    [18, 18, 'Kendra', 'Molina', 'kendramolina@sureplex.com', '+1 (920) 528-3330'],
                    [19, 19, 'Ebony', 'Livingston', 'ebonylivingston@danja.com',
                        '+1 (970) 591-3039'
                    ],
                    [20, 20, 'Kaufman', 'Rush', 'kaufmanrush@euron.com', '+1 (924) 463-2934'],
                    [21, 21, 'Frank', 'Hays', 'frankhays@illumity.com', '+1 (930) 577-2670'],
                    [22, 22, 'Carmella', 'Mccarty', 'carmellamccarty@sybixtex.com',
                        '+1 (876) 456-3218'
                    ],
                    [23, 23, 'Massey', 'Owen', 'masseyowen@zedalis.com', '+1 (917) 567-3786'],
                    [24, 24, 'Lottie', 'Lowery', 'lottielowery@dyno.com', '+1 (912) 539-3498'],
                    [25, 25, 'Addie', 'Luna', 'addieluna@multiflex.com', '+1 (962) 537-2981'],
                ],

                tabledata: [
                    [1, 1, 'Caroline', 'Jensen', 'carolinejensen@zidant.com', '+1 (821) 447-3782',
                        'POLARAX', '529 Scholes Street', 39, '2004-05-28', true
                    ],
                    [2, 2, 'Celeste', 'Grant', 'celestegrant@polarax.com', '+1 (838) 515-3408',
                        'MANGLO', '639 Kimball Street', 32, '1989-11-19', false
                    ],
                    [3, 3, 'Tillman', 'Forbes', 'tillmanforbes@manglo.com', '+1 (969) 496-2892',
                        'APPLIDECK', '240 Vandalia Avenue', 26, '2016-09-05', false
                    ],
                    [4, 4, 'Daisy', 'Whitley', 'daisywhitley@applideck.com', '+1 (861) 564-2877',
                        'VOLAX', '350 Pleasant Place', 21, '1987-03-23', true
                    ],
                    [5, 5, 'Weber', 'Bowman', 'weberbowman@volax.com', '+1 (962) 466-3483',
                        'ORBAXTER', '154 Conway Street', 26, '1983-02-24', false
                    ],
                    [6, 6, 'Buckley', 'Townsend', 'buckleytownsend@orbaxter.com',
                        '+1 (884) 595-2643', 'OPPORTECH', '131 Guernsey Street', 40, '2011-05-29',
                        true
                    ],
                    [7, 7, 'Latoya', 'Bradshaw', 'latoyabradshaw@opportech.com',
                        '+1 (906) 474-3155', 'GORGANIC', '668 Lenox Road', 24, '2010-11-23', true
                    ],
                    [8, 8, 'Kate', 'Lindsay', 'katelindsay@gorganic.com', '+1 (930) 546-2952',
                        'AVIT', '773 Harrison Avenue', 24, '1987-07-02', true
                    ],
                    [9, 9, 'Marva', 'Sandoval', 'marvasandoval@avit.com', '+1 (927) 566-3600',
                        'QUILCH', '200 Malta Street', 28, '2010-11-02', false
                    ],
                    [10, 10, 'Decker', 'Russell', 'deckerrussell@quilch.com', '+1 (846) 535-3283',
                        'MEMORA', '708 Bath Avenue', 27, '1994-04-21', false
                    ],
                    [11, 11, 'Odom', 'Mills', 'odommills@memora.com', '+1 (995) 525-3402',
                        'ZORROMOP', '907 Blake Avenue', 34, '2010-01-24', true
                    ],
                    [12, 12, 'Sellers', 'Walters', 'sellerswalters@zorromop.com',
                        '+1 (830) 430-3157', 'ORBOID', '978 Oakland Place', 28, '1975-11-12', true
                    ],
                    [13, 13, 'Wendi', 'Powers', 'wendipowers@orboid.com', '+1 (863) 457-2088',
                        'SNORUS', '376 Greenpoint Avenue', 31, '1979-06-02', true
                    ],
                    [14, 14, 'Sophie', 'Horn', 'sophiehorn@snorus.com', '+1 (885) 418-3948', 'XTH',
                        '343 Doughty Street', 22, '2018-09-20', true
                    ],
                    [15, 15, 'Levine', 'Rodriquez', 'levinerodriquez@xth.com', '+1 (999) 565-3239',
                        'COMTRACT', '643 Allen Avenue', 27, '1973-02-08', true
                    ],
                    [16, 16, 'Little', 'Hatfield', 'littlehatfield@comtract.com',
                        '+1 (812) 488-3011', 'ZIDANT', '194 Anthony Street', 33, '2012-01-03', false
                    ],
                    [17, 17, 'Larson', 'Kelly', 'larsonkelly@zidant.com', '+1 (892) 484-2162',
                        'SUREPLEX', '978 Indiana Place', 20, '2010-06-14', true
                    ],
                    [18, 18, 'Kendra', 'Molina', 'kendramolina@sureplex.com', '+1 (920) 528-3330',
                        'DANJA', '567 Charles Place', 31, '2002-07-19', false
                    ],
                    [19, 19, 'Ebony', 'Livingston', 'ebonylivingston@danja.com',
                        '+1 (970) 591-3039', 'EURON', '284 Cass Place', 33, '1994-10-18', false
                    ],
                    [20, 20, 'Kaufman', 'Rush', 'kaufmanrush@euron.com', '+1 (924) 463-2934',
                        'ILLUMITY', '408 Kingsland Avenue', 39, '2011-07-10', false
                    ],
                    [21, 21, 'Frank', 'Hays', 'frankhays@illumity.com', '+1 (930) 577-2670',
                        'SYBIXTEX', '973 Caton Place', 31, '2005-06-15', false
                    ],
                    [22, 22, 'Carmella', 'Mccarty', 'carmellamccarty@sybixtex.com',
                        '+1 (876) 456-3218', 'ZEDALIS', '919 Judge Street', 21, '1980-03-06', true
                    ],
                    [23, 23, 'Massey', 'Owen', 'masseyowen@zedalis.com', '+1 (917) 567-3786',
                        'DYNO', '108 Seaview Avenue', 40, '2012-03-01', false
                    ],
                    [24, 24, 'Lottie', 'Lowery', 'lottielowery@dyno.com', '+1 (912) 539-3498',
                        'MULTIFLEX', '557 Meserole Avenue', 36, '1982-10-10', true
                    ],
                    [25, 25, 'Addie', 'Luna', 'addieluna@multiflex.com', '+1 (962) 537-2981',
                        'PHARMACON', '688 Bulwer Place', 32, '1988-05-01', true
                    ],
                ],
                ids2: [],
                datatable2: null,
                tableData2: this.tabledata || [],

                ids3: [],
                datatable3: null,
                tableData3: this.tabledata || [],

                init() {
                    this.tableData2 = this.tabledata;
                    this.tableData3 = this.tabledata;

                    this.datatable1 = new simpleDatatables.DataTable('#myTable1', {
                        data: {
                            headings: [
                                '<input type="checkbox" class="form-checkbox" :value="ids1.length === tableData1.length" @change="checkAll1($event.target.checked)" />',
                                "ID", "First Name", "Last Name", "Email", "Phone"
                            ],
                            data: this.tableData1,
                        },
                        perPage: 20,
                        perPageSelect: [10, 20, 30, 50, 100],
                        columns: [{
                                select: 0,
                                sortable: false,
                                render: (data, cell, row) => {
                                    return `<input type="checkbox" class="form-checkbox" x-model="ids1" :value="${data}" />`;
                                }
                            },
                            {
                                select: 1,
                                render: (data, cell, row) => {
                                    return `<strong>#${data}</strong>`;
                                },
                            },
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
                            headings: [
                                '<input type="checkbox" class="form-checkbox" :value="ids2.length === tableData2.length" @change="checkAll2($event.target.checked)" />',
                                "ID", "First Name", "Last Name", "Email", "Phone",
                                "Company", "Address", "Age", "Birthdate", "Active"
                            ],
                            data: this.tableData2,
                        },
                        perPage: 10,
                        perPageSelect: [10, 20, 30, 50, 100],
                        columns: [{
                                select: 0,
                                sortable: false,
                                render: (data, cell, row) => {
                                    return `<input type="checkbox" class="form-checkbox" x-model="ids2" :value="${data}" />`;
                                }
                            },
                            {
                                select: 1,
                                render: (data, cell, row) => {
                                    return `<strong>#${data}</strong>`;
                                },
                            },
                            {
                                select: 4,
                                render: (data, cell, row) => {
                                    return `<a href="mailto:${data}" class="text-primary hover:underline">${ data }</a>`;
                                },
                            },
                            {
                                select: 9,
                                render: (data, cell, row) => {
                                    return this.formatDate(data);
                                },
                            },
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

                    this.datatable3 = new simpleDatatables.DataTable('#myTable3', {
                        data: {
                            headings: [
                                '<input type="checkbox" class="form-checkbox" :value="ids3.length === tableData3.length" @change="checkAll3($event.target.checked)" />',
                                "ID", "First Name", "Last Name", "Email", "Phone",
                                "Company", "Address", "Age", "Birthdate", "Active"
                            ],
                            data: this.tableData3,
                        },
                        perPage: 20,
                        perPageSelect: [10, 20, 30, 50, 100],
                        columns: [{
                                select: 0,
                                sortable: false,
                                render: (data, cell, row) => {
                                    return `<input type="checkbox" class="form-checkbox" x-model="ids3" :value="${data}" />`;
                                }
                            },
                            {
                                select: 1,
                                render: (data, cell, row) => {
                                    return `<strong>#${data}</strong>`;
                                },
                            },
                            {
                                select: 4,
                                render: (data, cell, row) => {
                                    return `<a href="mailto:${data}" class="text-primary hover:underline">${ data }</a>`;
                                },
                            },
                            {
                                select: 9,
                                render: (data, cell, row) => {
                                    return this.formatDate(data);
                                },
                            },
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

                checkAll1(isChecked) {
                    if (isChecked) {
                        this.ids1 = this.tableData1.map((d) => {
                            return d[0];
                        });
                    } else {
                        this.ids1 = [];
                    }
                },

                checkAll2(isChecked) {
                    if (isChecked) {
                        this.ids2 = this.tableData2.map((d) => {
                            return d[0];
                        });
                    } else {
                        this.ids2 = [];
                    }
                },

                checkAll3(isChecked) {
                    if (isChecked) {
                        this.ids3 = this.tableData3.map((d) => {
                            return d[0];
                        });
                    } else {
                        this.ids3 = [];
                    }
                },

            }));
        });
    </script>

</x-layout.default>
