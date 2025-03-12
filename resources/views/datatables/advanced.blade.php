<x-layout.default>

    <script defer src="/assets/js/apexcharts.js"></script>
    <script src="/assets/js/simple-datatables.js"></script>

    <div x-data="basic">
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
            <h5 class="font-semibold text-lg dark:text-white-light">Advanced</h5>
            <table id="myTable" class="whitespace-nowrap table-hover"></table>
        </div>
    </div>
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("basic", () => ({
                datatable: null,
                countryList: [{
                        code: 'AE',
                        name: 'United Arab Emirates'
                    },
                    {
                        code: 'AR',
                        name: 'Argentina'
                    },
                    {
                        code: 'AT',
                        name: 'Austria'
                    },
                    {
                        code: 'AU',
                        name: 'Australia'
                    },
                    {
                        code: 'BE',
                        name: 'Belgium'
                    },
                    {
                        code: 'BG',
                        name: 'Bulgaria'
                    },
                    {
                        code: 'BN',
                        name: 'Brunei'
                    },
                    {
                        code: 'BR',
                        name: 'Brazil'
                    },
                    {
                        code: 'BY',
                        name: 'Belarus'
                    },
                    {
                        code: 'CA',
                        name: 'Canada'
                    },
                    {
                        code: 'CH',
                        name: 'Switzerland'
                    },
                    {
                        code: 'CL',
                        name: 'Chile'
                    },
                    {
                        code: 'CN',
                        name: 'China'
                    },
                    {
                        code: 'CO',
                        name: 'Colombia'
                    },
                    {
                        code: 'CZ',
                        name: 'Czech Republic'
                    },
                    {
                        code: 'DE',
                        name: 'Germany'
                    },
                    {
                        code: 'DK',
                        name: 'Denmark'
                    },
                    {
                        code: 'DZ',
                        name: 'Algeria'
                    },
                    {
                        code: 'EC',
                        name: 'Ecuador'
                    },
                    {
                        code: 'EG',
                        name: 'Egypt'
                    },
                    {
                        code: 'ES',
                        name: 'Spain'
                    },
                    {
                        code: 'FI',
                        name: 'Finland'
                    },
                    {
                        code: 'FR',
                        name: 'France'
                    },
                    {
                        code: 'GB',
                        name: 'United Kingdom'
                    },
                    {
                        code: 'GR',
                        name: 'Greece'
                    },
                    {
                        code: 'HK',
                        name: 'Hong Kong'
                    },
                    {
                        code: 'HR',
                        name: 'Croatia'
                    },
                    {
                        code: 'HU',
                        name: 'Hungary'
                    },
                    {
                        code: 'ID',
                        name: 'Indonesia'
                    },
                    {
                        code: 'IE',
                        name: 'Ireland'
                    },
                    {
                        code: 'IL',
                        name: 'Israel'
                    },
                    {
                        code: 'IN',
                        name: 'India'
                    },
                    {
                        code: 'IT',
                        name: 'Italy'
                    },
                    {
                        code: 'JO',
                        name: 'Jordan'
                    },
                    {
                        code: 'JP',
                        name: 'Japan'
                    },
                    {
                        code: 'KE',
                        name: 'Kenya'
                    },
                    {
                        code: 'KH',
                        name: 'Cambodia'
                    },
                    {
                        code: 'KR',
                        name: 'South Korea'
                    },
                    {
                        code: 'KZ',
                        name: 'Kazakhstan'
                    },
                    {
                        code: 'LA',
                        name: 'Laos'
                    },
                    {
                        code: 'LK',
                        name: 'Sri Lanka'
                    },
                    {
                        code: 'MA',
                        name: 'Morocco'
                    },
                    {
                        code: 'MM',
                        name: 'Myanmar'
                    },
                    {
                        code: 'MO',
                        name: 'Macau'
                    },
                    {
                        code: 'MX',
                        name: 'Mexico'
                    },
                    {
                        code: 'MY',
                        name: 'Malaysia'
                    },
                    {
                        code: 'NG',
                        name: 'Nigeria'
                    },
                    {
                        code: 'NL',
                        name: 'Netherlands'
                    },
                    {
                        code: 'NO',
                        name: 'Norway'
                    },
                    {
                        code: 'NZ',
                        name: 'New Zealand'
                    },
                    {
                        code: 'PE',
                        name: 'Peru'
                    },
                    {
                        code: 'PH',
                        name: 'Philippines'
                    },
                    {
                        code: 'PK',
                        name: 'Pakistan'
                    },
                    {
                        code: 'PL',
                        name: 'Poland'
                    },
                    {
                        code: 'PT',
                        name: 'Portugal'
                    },
                    {
                        code: 'QA',
                        name: 'Qatar'
                    },
                    {
                        code: 'RO',
                        name: 'Romania'
                    },
                    {
                        code: 'RS',
                        name: 'Serbia'
                    },
                    {
                        code: 'RU',
                        name: 'Russia'
                    },
                    {
                        code: 'SA',
                        name: 'Saudi Arabia'
                    },
                    {
                        code: 'SE',
                        name: 'Sweden'
                    },
                    {
                        code: 'SG',
                        name: 'Singapore'
                    },
                    {
                        code: 'SK',
                        name: 'Slovakia'
                    },
                    {
                        code: 'TH',
                        name: 'Thailand'
                    },
                    {
                        code: 'TN',
                        name: 'Tunisia'
                    },
                    {
                        code: 'TR',
                        name: 'Turkey'
                    },
                    {
                        code: 'TW',
                        name: 'Taiwan'
                    },
                    {
                        code: 'UK',
                        name: 'Ukraine'
                    },
                    {
                        code: 'UG',
                        name: 'Uganda'
                    },
                    {
                        code: 'US',
                        name: 'United States'
                    },
                    {
                        code: 'VN',
                        name: 'Vietnam'
                    },
                    {
                        code: 'ZA',
                        name: 'South Africa'
                    },
                    {
                        code: 'BA',
                        name: 'Bosnia and Herzegovina'
                    },
                    {
                        code: 'BD',
                        name: 'Bangladesh'
                    },
                    {
                        code: 'EE',
                        name: 'Estonia'
                    },
                    {
                        code: 'IQ',
                        name: 'Iraq'
                    },
                    {
                        code: 'LU',
                        name: 'Luxembourg'
                    },
                    {
                        code: 'LV',
                        name: 'Latvia'
                    },
                    {
                        code: 'MK',
                        name: 'North Macedonia'
                    },
                    {
                        code: 'SI',
                        name: 'Slovenia'
                    },
                    {
                        code: 'PA',
                        name: 'Panama'
                    },
                ],
                init() {
                    this.datatable = new simpleDatatables.DataTable('#myTable', {
                        data: {
                            headings: ["ID", "User", "Country", "Email", "Progress", "Phone",
                                "<div class='text-center'>Rate</div>", "Progress", "Status"
                            ],
                            data: [
                                [1, 'Caroline Jensen', '', 'carolinejensen@zidant.com', 39,
                                    '+1 (821) 447-3782', '', '', ''
                                ],
                                [2, 'Celeste Grant', '', 'celestegrant@polarax.com', 32,
                                    '+1 (838) 515-3408', '', '', ''
                                ],
                                [3, 'Tillman Forbes', '', 'tillmanforbes@manglo.com', 26,
                                    '+1 (969) 496-2892', '', '', ''
                                ],
                                [4, 'Daisy Whitley', '', 'daisywhitley@applideck.com', 21,
                                    '+1 (861) 564-2877', '', '', ''
                                ],
                                [5, 'Weber Bowman', '', 'weberbowman@volax.com', 26,
                                    '+1 (962) 466-3483', '', '', ''
                                ],
                                [6, 'Buckley Townsend', '', 'buckleytownsend@orbaxter.com',
                                    40, '+1 (884) 595-2643', '', '', ''
                                ],
                                [7, 'Latoya Bradshaw', '', 'latoyabradshaw@opportech.com',
                                    24, '+1 (906) 474-3155', '', '', ''
                                ],
                                [8, 'Kate Lindsay', '', 'katelindsay@gorganic.com', 24,
                                    '+1 (930) 546-2952', '', '', ''
                                ],
                                [9, 'Marva Sandoval', '', 'marvasandoval@avit.com', 28,
                                    '+1 (927) 566-3600', '', '', ''
                                ],
                                [10, 'Decker Russell', '', 'deckerrussell@quilch.com', 27,
                                    '+1 (846) 535-3283', '', '', ''
                                ],
                                [11, 'Odom Mills', '', 'odommills@memora.com', 34,
                                    '+1 (995) 525-3402', '', '', ''
                                ],
                                [12, 'Sellers Walters', '', 'sellerswalters@zorromop.com',
                                    28, '+1 (830) 430-3157', '', '', ''
                                ],
                                [13, 'Wendi Powers', '', 'wendipowers@orboid.com', 31,
                                    '+1 (863) 457-2088', '', '', ''
                                ],
                                [14, 'Sophie Horn', '', 'sophiehorn@snorus.com', 22,
                                    '+1 (885) 418-3948', '', '', ''
                                ],
                                [15, 'Levine Rodriquez', '', 'levinerodriquez@xth.com', 27,
                                    '+1 (999) 565-3239', '', '', ''
                                ],
                                [16, 'Little Hatfield', '', 'littlehatfield@comtract.com',
                                    33, '+1 (812) 488-3011', '', '', ''
                                ],
                                [17, 'Larson Kelly', '', 'larsonkelly@zidant.com', 20,
                                    '+1 (892) 484-2162', '', '', ''
                                ],
                                [18, 'Kendra Molina', '', 'kendramolina@sureplex.com', 31,
                                    '+1 (920) 528-3330', '', '', ''
                                ],
                                [19, 'Ebony Livingston', '', 'ebonylivingston@danja.com',
                                    33, '+1 (970) 591-3039', '', '', ''
                                ],
                                [20, 'Kaufman Rush', '', 'kaufmanrush@euron.com', 39,
                                    '+1 (924) 463-2934', '', '', ''
                                ],
                                [21, 'Frank Hays', '', 'frankhays@illumity.com', 31,
                                    '+1 (930) 577-2670', '', '', ''
                                ],
                                [22, 'Carmella Mccarty', '', 'carmellamccarty@sybixtex.com',
                                    21, '+1 (876) 456-3218', '', '', ''
                                ],
                                [23, 'Massey Owen', '', 'masseyowen@zedalis.com', 40,
                                    '+1 (917) 567-3786', '', '', ''
                                ],
                                [24, 'Lottie Lowery', '', 'lottielowery@dyno.com', 36,
                                    '+1 (912) 539-3498', '', '', ''
                                ],
                                [25, 'Addie Luna', '', 'addieluna@multiflex.com', 32,
                                    '+1 (962) 537-2981', '', '', ''
                                ],
                            ]
                        },
                        searchable: false,
                        perPage: 10,
                        perPageSelect: [10, 20, 30, 50, 100],
                        columns: [{
                                select: 0,
                                render: (data, cell, row) => {
                                    return `<strong class="text-info">#${ data}</strong>`;
                                },
                            },
                            {
                                select: 1,
                                render: (data, cell, row) => {
                                    return `<div class="flex items-center gap-2">
                                                <img src="/assets/images/profile-${this.getRandomNumber(1, 34)}.jpeg" class="w-9 h-9 rounded-full max-w-none" alt="user-profile" />
                                                <div class="font-semibold">${ data }</div>
                                        </div>`
                                },
                            },
                            {
                                select: 2,
                                render: (data, cell, row) => {
                                    return `<div class="flex items-center gap-2">
                                            <img width="24" src="/assets/images/flags/${this.getCountry().code}.svg" class="max-w-none" alt="user profile" />
                                            <div>${ this.getCountry().name }</div>
                                        </div>`
                                },
                                sortable: false,
                            },
                            {
                                select: 3,
                                render: (data, cell, row) => {
                                    return `<a href="mailto:${data}" class="text-primary hover:underline">${ data }</a>`
                                },
                            },
                            {
                                select: 4,
                                render: (data, cell, row) => {
                                    return `<div class="w-4/5 min-w-[100px] h-2.5 bg-[#ebedf2] dark:bg-dark/40 rounded-full flex">
                                            <div class="h-2.5 rounded-full rounded-bl-full text-center text-white text-xs bg-${this.randomStatusColor()}" style="width:${this.getRandomNumber(15, 100)}%"></div>
                                        </div>`
                                },
                                sortable: false,
                            },
                            {
                                select: 6,
                                render: (data, cell, row) => {
                                    let str =
                                        '<div class="flex items-center justify-center text-warning">';
                                    for (let i = 0; i < this.getRandomNumber(1,
                                        5); i++) {
                                        str += `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-warning">
                                                <path d="M9.15316 5.40838C10.4198 3.13613 11.0531 2 12 2C12.9469 2 13.5802 3.13612 14.8468 5.40837L15.1745 5.99623C15.5345 6.64193 15.7144 6.96479 15.9951 7.17781C16.2757 7.39083 16.6251 7.4699 17.3241 7.62805L17.9605 7.77203C20.4201 8.32856 21.65 8.60682 21.9426 9.54773C22.2352 10.4886 21.3968 11.4691 19.7199 13.4299L19.2861 13.9372C18.8096 14.4944 18.5713 14.773 18.4641 15.1177C18.357 15.4624 18.393 15.8341 18.465 16.5776L18.5306 17.2544C18.7841 19.8706 18.9109 21.1787 18.1449 21.7602C17.3788 22.3417 16.2273 21.8115 13.9243 20.7512L13.3285 20.4768C12.6741 20.1755 12.3469 20.0248 12 20.0248C11.6531 20.0248 11.3259 20.1755 10.6715 20.4768L10.0757 20.7512C7.77268 21.8115 6.62118 22.3417 5.85515 21.7602C5.08912 21.1787 5.21588 19.8706 5.4694 17.2544L5.53498 16.5776C5.60703 15.8341 5.64305 15.4624 5.53586 15.1177C5.42868 14.773 5.19043 14.4944 4.71392 13.9372L4.2801 13.4299C2.60325 11.4691 1.76482 10.4886 2.05742 9.54773C2.35002 8.60682 3.57986 8.32856 6.03954 7.77203L6.67589 7.62805C7.37485 7.4699 7.72433 7.39083 8.00494 7.17781C8.28555 6.96479 8.46553 6.64194 8.82547 5.99623L9.15316 5.40838Z" stroke="currentColor" stroke-width="1.5" />
                                            </svg>`;
                                    }
                                    str += '</div>';
                                    return str;
                                },
                                sortable: false,
                            },
                            {
                                select: 7,
                                render: (data, cell, row) => {
                                    return `<div style="width: 150px" class="overflow-hidden"> <div class="progress-chart"></div></div>`
                                },
                                sortable: false,
                            },
                            {
                                select: 8,
                                render: (data, cell, row) => {
                                    return `<span class="badge badge-outline-${this.randomStatusColor()}">${ this.randomStatus() }</span>`
                                },
                                sortable: false,
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

                    this.datatable.on('datatable.sort', () => {
                        this.initChart();
                    });

                    this.datatable.on('datatable.page', () => {
                        this.initChart();
                    });

                    this.datatable.on('datatable.perpage', () => {
                        this.initChart();
                    });

                    setTimeout(() => {
                        this.initChart();
                    }, 300);

                },

                initChart() {
                    const ele = document.querySelectorAll('.progress-chart');
                    let chart = [];
                    for (let i = 0; i < ele.length; i++) {
                        ele[i].innerHTML = '';
                        chart[i] = new ApexCharts(ele[i], this.chart_options);
                        chart[i].render();
                    }
                },

                get chart_options() {
                    let option = {
                        series: [{
                            data: [21, 9, 36, 12, 44, 25, 59]
                        }],
                        chart: {
                            type: 'line',
                            height: 30,
                            sparkline: {
                                enabled: true
                            }
                        },
                        stroke: {
                            curve: 'smooth',
                            width: 2
                        },
                        markers: {
                            size: [4, 7],
                            strokeWidth: 0
                        },
                        colors: [this.randomColor()],
                        grid: {
                            padding: {
                                top: 5,
                                bottom: 5
                            }
                        },
                        tooltip: {
                            x: {
                                show: false
                            },
                            y: {
                                title: {
                                    formatter: () => {
                                        return '';
                                    },
                                },
                            },
                        },
                    };
                    return option;
                },

                randomColor() {
                    const color = ['#4361ee', '#805dca', '#00ab55', '#e7515a', '#e2a03f', '#2196f3'];
                    const random = Math.floor(Math.random() * color.length);
                    return color[random];
                },

                randomStatusColor() {
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
                },

                getRandomNumber(min, max) {
                    return Math.floor(Math.random() * (max - min + 1)) + min;
                },

                getCountry() {
                    const random = Math.floor(Math.random() * this.countryList.length);
                    return this.countryList[random];
                },
            }));
        });
    </script>

</x-layout.default>
