<x-layout.default>


    <script src="/assets/js/simple-datatables.js"></script>

    <div x-data="rangeSearch">
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
            <div class="md:absolute md:top-5 ltr:md:left-5 rtl:md:right-5">
                <div class="flex items-center gap-x-5">
                    <div class="mb-5 md:w-auto w-1/2">
                        <input id="minvalue" type="text" placeholder="Minimum age..." class="form-input"
                            x-model="minAge" @keyup.prevent="rangeChange()" />
                    </div>
                    <div class="mb-5 md:w-auto w-1/2">
                        <input id="maxvalue" type="text" placeholder="Maximum age..." class="form-input"
                            x-model="maxAge" @keyup.prevent="rangeChange()" />
                    </div>
                </div>
            </div>
            <table id="myTable" class="whitespace-nowrap table-hover"></table>
        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("rangeSearch", () => ({
                minAge: null,
                maxAge: null,

                allData: [{
                        id: 1,
                        name: 'Caroline Jensen',
                        company: 'POLARAX',
                        age: 39,
                        dob: '2004-05-28',
                        email: 'carolinejensen@zidant.com',
                        phone: '+1 (821) 447-3782',
                    },
                    {
                        id: 2,
                        name: 'Celeste Grant',
                        company: 'MANGLO',
                        age: 32,
                        dob: '1989-11-19',
                        email: 'celestegrant@polarax.com',
                        phone: '+1 (838) 515-3408',
                    },
                    {
                        id: 3,
                        name: 'Tillman Forbes',
                        company: 'APPLIDECK',
                        age: 26,
                        dob: '2016-09-05',
                        email: 'tillmanforbes@manglo.com',
                        phone: '+1 (969) 496-2892',
                    },
                    {
                        id: 4,
                        name: 'Daisy Whitley',
                        company: 'VOLAX',
                        age: 21,
                        dob: '1987-03-23',
                        email: 'daisywhitley@applideck.com',
                        phone: '+1 (861) 564-2877',
                    },
                    {
                        id: 5,
                        name: 'Weber Bowman',
                        company: 'ORBAXTER',
                        age: 26,
                        dob: '1983-02-24',
                        email: 'weberbowman@volax.com',
                        phone: '+1 (962) 466-3483',
                    },
                    {
                        id: 6,
                        name: 'Buckley Townsend',
                        company: 'OPPORTECH',
                        age: 40,
                        dob: '2011-05-29',
                        email: 'buckleytownsend@orbaxter.com',
                        phone: '+1 (884) 595-2643',
                    },
                    {
                        id: 7,
                        name: 'Latoya Bradshaw',
                        company: 'GORGANIC',
                        age: 24,
                        dob: '2010-11-23',
                        email: 'latoyabradshaw@opportech.com',
                        phone: '+1 (906) 474-3155',
                    },
                    {
                        id: 8,
                        name: 'Kate Lindsay',
                        company: 'AVIT',
                        age: 24,
                        dob: '1987-07-02',
                        email: 'katelindsay@gorganic.com',
                        phone: '+1 (930) 546-2952',
                    },
                    {
                        id: 9,
                        name: 'Marva Sandoval',
                        company: 'QUILCH',
                        age: 28,
                        dob: '2010-11-02',
                        email: 'marvasandoval@avit.com',
                        phone: '+1 (927) 566-3600',
                    },
                    {
                        id: 10,
                        name: 'Decker Russell',
                        company: 'MEMORA',
                        age: 27,
                        dob: '1994-04-21',
                        email: 'deckerrussell@quilch.com',
                        phone: '+1 (846) 535-3283',
                    },
                    {
                        id: 11,
                        name: 'Odom Mills',
                        company: 'ZORROMOP',
                        age: 34,
                        dob: '2010-01-24',
                        email: 'odommills@memora.com',
                        phone: '+1 (995) 525-3402',
                    },
                    {
                        id: 12,
                        name: 'Sellers Walters',
                        company: 'ORBOID',
                        age: 28,
                        dob: '1975-11-12',
                        email: 'sellerswalters@zorromop.com',
                        phone: '+1 (830) 430-3157',
                    },
                    {
                        id: 13,
                        name: 'Wendi Powers',
                        company: 'SNORUS',
                        age: 31,
                        dob: '1979-06-02',
                        email: 'wendipowers@orboid.com',
                        phone: '+1 (863) 457-2088',
                    },
                    {
                        id: 14,
                        name: 'Sophie Horn',
                        company: 'XTH',
                        age: 22,
                        dob: '2018-09-20',
                        email: 'sophiehorn@snorus.com',
                        phone: '+1 (885) 418-3948',
                    },
                    {
                        id: 15,
                        name: 'Levine Rodriquez',
                        company: 'COMTRACT',
                        age: 27,
                        dob: '1973-02-08',
                        email: 'levinerodriquez@xth.com',
                        phone: '+1 (999) 565-3239',
                    },
                    {
                        id: 16,
                        name: 'Little Hatfield',
                        company: 'ZIDANT',
                        age: 33,
                        dob: '2012-01-03',
                        email: 'littlehatfield@comtract.com',
                        phone: '+1 (812) 488-3011',
                    },
                    {
                        id: 17,
                        name: 'Larson Kelly',
                        company: 'SUREPLEX',
                        age: 20,
                        dob: '2010-06-14',
                        email: 'larsonkelly@zidant.com',
                        phone: '+1 (892) 484-2162',
                    },
                    {
                        id: 18,
                        name: 'Kendra Molina',
                        company: 'DANJA',
                        age: 31,
                        dob: '2002-07-19',
                        email: 'kendramolina@sureplex.com',
                        phone: '+1 (920) 528-3330',
                    },
                    {
                        id: 19,
                        name: 'Ebony Livingston',
                        company: 'EURON',
                        age: 33,
                        dob: '1994-10-18',
                        email: 'ebonylivingston@danja.com',
                        phone: '+1 (970) 591-3039',
                    },
                    {
                        id: 20,
                        name: 'Kaufman Rush',
                        company: 'ILLUMITY',
                        age: 39,
                        dob: '2011-07-10',
                        email: 'kaufmanrush@euron.com',
                        phone: '+1 (924) 463-2934',
                    },
                    {
                        id: 21,
                        name: 'Frank Hays',
                        company: 'SYBIXTEX',
                        age: 31,
                        dob: '2005-06-15',
                        email: 'frankhays@illumity.com',
                        phone: '+1 (930) 577-2670',
                    },
                    {
                        id: 22,
                        name: 'Carmella Mccarty',
                        company: 'ZEDALIS',
                        age: 21,
                        dob: '1980-03-06',
                        email: 'carmellamccarty@sybixtex.com',
                        phone: '+1 (876) 456-3218',
                    },
                    {
                        id: 23,
                        name: 'Massey Owen',
                        company: 'DYNO',
                        age: 40,
                        dob: '2012-03-01',
                        email: 'masseyowen@zedalis.com',
                        phone: '+1 (917) 567-3786',
                    },
                    {
                        id: 24,
                        name: 'Lottie Lowery',
                        company: 'MULTIFLEX',
                        age: 36,
                        dob: '1982-10-10',
                        email: 'lottielowery@dyno.com',
                        phone: '+1 (912) 539-3498',
                    },
                    {
                        id: 25,
                        name: 'Addie Luna',
                        company: 'PHARMACON',
                        age: 32,
                        dob: '1988-05-01',
                        email: 'addieluna@multiflex.com',
                        phone: '+1 (962) 537-2981',
                    },
                ],
                filterData: [],

                dataArr: [],

                datatable: null,

                rangeChange() {
                    let dt = this.allData;
                    if (this.minAge != '' && this.minAge != null) {
                        dt = dt.filter((d) => d.age >= Number(this.minAge));
                    }
                    if (this.maxAge != '' && this.maxAge != null) {
                        dt = dt.filter((d) => d.age <= Number(this.maxAge));
                    }

                    this.filterData = dt;
                    this.dataArr = [];
                    this.setTableData();
                    this.datatable.destroy();
                },

                setTableData() {
                    for (let i = 0; i < this.filterData.length; i++) {
                        this.dataArr[i] = [];
                        for (let p in this.filterData[i]) {
                            if (this.filterData[i].hasOwnProperty(p)) {
                                this.dataArr[i].push(this.filterData[i][p]);
                            }
                        }
                    }
                },
                initializeTable() {
                    this.datatable = new simpleDatatables.DataTable('#myTable', {
                        data: {
                            headings: ['Id', 'Name', 'Company', 'Age', 'Start Date', 'Email',
                                'Phone No.'
                            ],
                            data: this.dataArr,
                        },
                        columns: [{
                                select: 0,
                                sort: 'asc',
                            },
                            {
                                select: 4,
                                render: (data, cell, row) => {
                                    return this.formatDate(data);
                                },
                            }
                        ],
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
                    })
                },

                init() {
                    this.$watch('dataArr', value => {
                        this.initializeTable();
                    });
                    this.filterData = this.allData;
                    this.setTableData();
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

            }));
        });
    </script>

</x-layout.default>
