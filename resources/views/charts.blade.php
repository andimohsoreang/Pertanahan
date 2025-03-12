<x-layout.default>


    <script defer src="/assets/js/apexcharts.js"></script>
    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse mb-6">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Charts</span>
            </li>
        </ul>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8" x-data="chart">

            <div class="panel lg:col-span-2 p-3 flex items-center text-primary overflow-x-auto whitespace-nowrap">
                <div class="ring-2 ring-primary/30 rounded-full bg-primary text-white p-1.5 ltr:mr-3 rtl:ml-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5">
                        <path
                            d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z"
                            stroke="currentColor" stroke-width="1.5" />
                        <path opacity="0.5"
                            d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </div>
                <span class="ltr:mr-3 rtl:ml-3">Documentation: </span>
                <a href="https://www.npmjs.com/package/apexcharts" target="_blank"
                    class="block hover:underline">https://www.npmjs.com/package/apexcharts</a>
            </div>

            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Simple Line</h5>
                    <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                        href="javascript:;" @click="toggleCode('code1')"><span class="flex items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                <path
                                    d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" />
                                <path
                                    d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                            Code
                        </span>
                    </a>
                </div>
                <div x-ref="lineChart" class="bg-white dark:bg-black rounded-lg overflow-hidden"></div>
                <template x-if="codeArr.includes('code1')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
&lt;!-- simple line --&gt;
&lt;div x-ref=&quot;lineChart&quot; class=&quot;bg-white dark:bg-black rounded-lg overflow-hidden&quot;&gt;&lt;/div&gt;

&lt;!-- script --&gt;
&lt;script&gt;
    document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
        Alpine.data(&quot;chart&quot;, () =&gt; ({

            init() {
                isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;

                let lineChart = new ApexCharts(this.$refs.lineChart, this.lineChartOptions);
                lineChart.render();

                get lineChartOptions() {
                    return {
                        chart: {
                            height: 300,
                            type: 'line',
                            toolbar: false
                        },
                        colors: ['#4361ee'],
                        tooltip: {
                            marker: false,
                            y: {
                                formatter(number) {
                                    return '$' + number
                                }
                            }
                        },
                        stroke: {
                            width: 2,
                            curve: 'smooth'
                        },
                        xaxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June'],
                            axisBorder: {
                                color: isDark ? '#191e3a' : '#e0e6ed'
                            },
                        },
                        yaxis: {
                            opposite: isRtl ? true : false,
                            labels: {
                                offsetX: isRtl ? -20 : 0,
                            }
                        },
                        series: [{
                            name: 'Sales',
                            data: [45, 55, 75, 25, 45, 110],
                        }],
                        grid: {
                            borderColor: isDark ? '#191e3a' : '#e0e6ed',
                        },
                        tooltip: {
                            theme: isDark ? 'dark' : 'light',
                        }
                    }
                },

                this.$watch('$store.app.theme', () =&gt; {
                    isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;
                    lineChart.updateOptions(this.lineChartOptions);
                })
            },
        }));
    });
&lt;/script&gt;
</pre>
                </template>
            </div>

            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white">Simple Area</h5>
                    <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                        href="javascript:;" @click="toggleCode('code2')"><span class="flex items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                <path
                                    d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" />
                                <path
                                    d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                            Code
                        </span>
                    </a>
                </div>
                <div x-ref="areaChart" class="bg-white dark:bg-black rounded-lg overflow-hidden"></div>
                <template x-if="codeArr.includes('code2')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
&lt;!-- simple area --&gt;
&lt;div x-ref=&quot;areaChart&quot; class=&quot;bg-white dark:bg-black rounded-lg overflow-hidden&quot;&gt;&lt;/div&gt;

&lt;!-- script --&gt;
&lt;script&gt;
    document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
        Alpine.data(&quot;chart&quot;, () =&gt; ({

            init() {
                isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;

                let areaChart = new ApexCharts(this.$refs.areaChart, this.areaChartOptions);
                areaChart.render();

                get areaChartOptions() {
                    return {
                        series: [{
                            name: 'Income',
                            data: [16800, 16800, 15500, 17800, 15500, 17000, 19000, 16000, 15000, 17000, 14000, 17000]
                        }],
                        chart: {
                            type: 'area',
                            height: 300,
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ['#805dca'],
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            width: 2,
                            curve: 'smooth'
                        },
                        xaxis: {
                            axisBorder: {
                                color: isDark ? '#191e3a' : '#e0e6ed'
                            },
                        },
                        yaxis: {
                            opposite: isRtl ? true : false,
                            labels: {
                                offsetX: isRtl ? -40 : 0,
                            }
                        },
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        legend: {
                            horizontalAlign: 'left'
                        },
                        grid: {
                            borderColor: isDark ? '#191e3a' : '#e0e6ed',
                        },
                        tooltip: {
                            theme: isDark ? 'dark' : 'light',
                        }
                    }
                },

                this.$watch('$store.app.theme', () =&gt; {
                    isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;
                    areaChart.updateOptions(this.areaChartOptions);
                })
            },
        }));
    });
&lt;/script&gt;

</pre>
                </template>
            </div>

            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white">Simple Column</h5>
                    <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                        href="javascript:;" @click="toggleCode('code3')"><span class="flex items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                <path
                                    d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" />
                                <path
                                    d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                            Code
                        </span>
                    </a>
                </div>
                <div x-ref="columnChart" class="bg-white dark:bg-black rounded-lg overflow-hidden"></div>
                <template x-if="codeArr.includes('code3')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
&lt;!-- simple column --&gt;
&lt;div x-ref=&quot;columnChart&quot; class=&quot;bg-white dark:bg-black rounded-lg overflow-hidden&quot;&gt;&lt;/div&gt;

&lt;!-- script --&gt;
&lt;script&gt;
    document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
        Alpine.data(&quot;chart&quot;, () =&gt; ({

            init() {
                isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;

                let columnChart = new ApexCharts(this.$refs.columnChart, this.columnChartOptions);
                columnChart.render();

                get columnChartOptions() {
                    return {
                        series: [{
                            name: 'Net Profit',
                            data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
                        }, {
                            name: 'Revenue',
                            data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
                        }],
                        chart: {
                            height: 300,
                            type: 'bar',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ['#805dca', '#e7515a'],
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            width: 2,
                            colors: ['transparent']
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '55%',
                                endingShape: 'rounded'
                            },
                        },
                        grid: {
                            borderColor: isDark ? '#191e3a' : '#e0e6ed'
                        },
                        xaxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                            axisBorder: {
                                color: isDark ? '#191e3a' : '#e0e6ed'
                            },
                        },
                        yaxis: {
                            opposite: isRtl ? true : false,
                            labels: {
                                offsetX: isRtl ? -10 : 0,
                            }
                        },
                        tooltip: {
                            theme: isDark ? 'dark' : 'light',
                            y: {
                                formatter: function(val) {
                                    return val;
                                },
                            },
                        },
                    }
                },

                this.$watch('$store.app.theme', () =&gt; {
                    isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;
                    columnChart.updateOptions(this.columnChartOptions);
                })
            },
        }));
    });
&lt;/script&gt;
</pre>
                </template>
            </div>

            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white">Simple Column Stacked</h5>
                    <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                        href="javascript:;" @click="toggleCode('code4')"><span class="flex items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                <path
                                    d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" />
                                <path
                                    d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                            Code
                        </span>
                    </a>
                </div>
                <div x-ref="simpleColumnStacked" class="bg-white dark:bg-black rounded-lg overflow-hidden"></div>
                <template x-if="codeArr.includes('code4')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
&lt;!-- simple column stacked --&gt;
&lt;div x-ref=&quot;simpleColumnStacked&quot; class=&quot;bg-white dark:bg-black rounded-lg overflow-hidden&quot;&gt;&lt;/div&gt;

&lt;!-- script --&gt;
&lt;script&gt;
    document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
        Alpine.data(&quot;chart&quot;, () =&gt; ({

            init() {
                isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;

                let simpleColumnStacked = new ApexCharts(this.$refs.simpleColumnStacked, this.simpleColumnStackedOptions);
                simpleColumnStacked.render();

                get simpleColumnStackedOptions() {
                    return {
                        series: [{
                                name: 'PRODUCT A',
                                data: [44, 55, 41, 67, 22, 43]
                            },
                            {
                                name: 'PRODUCT B',
                                data: [13, 23, 20, 8, 13, 27]
                            },
                        ],
                        chart: {
                            height: 300,
                            type: 'bar',
                            stacked: true,
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ['#2196f3', '#3b3f5c'],
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                legend: {
                                    position: 'bottom',
                                    offsetX: -10,
                                    offsetY: 5
                                }
                            }
                        }],
                        plotOptions: {
                            bar: {
                                horizontal: false
                            }
                        },
                        xaxis: {
                            type: 'datetime',
                            categories: ['01/01/2011 GMT', '01/02/2011 GMT', '01/03/2011 GMT', '01/04/2011 GMT', '01/05/2011 GMT', '01/06/2011 GMT'],
                            axisBorder: {
                                color: isDark ? '#191e3a' : '#e0e6ed'
                            },
                        },
                        yaxis: {
                            opposite: isRtl ? true : false,
                            labels: {
                                offsetX: isRtl ? -20 : 0,
                            }
                        },
                        grid: {
                            borderColor: isDark ? '#191e3a' : '#e0e6ed'
                        },
                        legend: {
                            position: 'right',
                            offsetY: 40
                        },
                        tooltip: {
                            theme: isDark ? 'dark' : 'light'
                        },
                        fill: {
                            opacity: 0.8
                        }
                    }
                },

                this.$watch('$store.app.theme', () =&gt; {
                    isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;
                    simpleColumnStacked.updateOptions(this.simpleColumnStackedOptions);
                })
            },
        }));
    });
&lt;/script&gt;
</pre>
                </template>
            </div>

            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white">Simple Bar</h5>
                    <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                        href="javascript:;" @click="toggleCode('code5')"><span class="flex items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                <path
                                    d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" />
                                <path
                                    d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                            Code
                        </span>
                    </a>
                </div>
                <div x-ref="barChart" class="bg-white dark:bg-black rounded-lg overflow-hidden"></div>
                <template x-if="codeArr.includes('code5')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
&lt;!-- simple bar --&gt;
&lt;div x-ref=&quot;barChart&quot; class=&quot;bg-white dark:bg-black rounded-lg overflow-hidden&quot;&gt;&lt;/div&gt;

&lt;!-- script --&gt;
&lt;script&gt;
    document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
        Alpine.data(&quot;chart&quot;, () =&gt; ({

            init() {
                isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;

                let barChart = new ApexCharts(this.$refs.barChart, this.barChartOptions);
                barChart.render();

                get barChartOptions() {
                    return {
                        series: [{
                            name: 'Sales',
                            data: [44, 55, 41, 67, 22, 43, 21, 70]
                        }],
                        chart: {
                            height: 300,
                            type: 'bar',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            width: 1
                        },
                        colors: ['#4361ee'],
                        xaxis: {
                            categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat'],
                            axisBorder: {
                                color: isDark ? '#191e3a' : '#e0e6ed'
                            },
                        },
                        yaxis: {
                            opposite: isRtl ? true : false,
                            reversed: isRtl ? true : false,
                        },
                        grid: {
                            borderColor: isDark ? '#191e3a' : '#e0e6ed',
                        },
                        plotOptions: {
                            bar: {
                                horizontal: true,
                            }
                        },
                        fill: {
                            opacity: 0.8
                        }
                    }
                },

                this.$watch('$store.app.theme', () =&gt; {
                    isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;
                    barChart.updateOptions(this.barChartOptions);
                })
            },
        }));
    });
&lt;/script&gt;
</pre>
                </template>
            </div>

            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white">Mixed</h5>
                    <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                        href="javascript:;" @click="toggleCode('code6')"><span class="flex items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                <path
                                    d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" />
                                <path
                                    d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                            Code
                        </span>
                    </a>
                </div>
                <div x-ref="mixedChart" class="bg-white dark:bg-black rounded-lg overflow-hidden"></div>
                <template x-if="codeArr.includes('code6')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
&lt;!-- mixed --&gt;
&lt;div x-ref=&quot;mixedChart&quot; class=&quot;bg-white dark:bg-black rounded-lg overflow-hidden&quot;&gt;&lt;/div&gt;

&lt;!-- script --&gt;
&lt;script&gt;
    document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
        Alpine.data(&quot;chart&quot;, () =&gt; ({

            init() {
                isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;

                let mixedChart = new ApexCharts(this.$refs.mixedChart, this.mixedChartOptions);
                mixedChart.render();

                get mixedChartOptions() {
                    return {
                        series: [{
                                name: 'TEAM A',
                                type: 'column',
                                data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30]
                            }, {
                                name: 'TEAM B',
                                type: 'area',
                                data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
                            },
                            {
                                name: 'TEAM C',
                                type: 'line',
                                data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
                            }
                        ],
                        chart: {
                            height: 300,
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ['#2196f3', '#00ab55', '#4361ee'],
                        stroke: {
                            width: [0, 2, 2],
                            curve: 'smooth'
                        },
                        plotOptions: {
                            bar: {
                                columnWidth: '50%'
                            }
                        },
                        fill: {
                            opacity: [1, 0.25, 1],
                        },

                        labels: ['01/01/2022', '02/01/2022', '03/01/2022', '04/01/2022', '05/01/2022', '06/01/2022', '07/01/2022',
                            '08/01/2022', '09/01/2022', '10/01/2022', '11/01/2022'
                        ],
                        markers: {
                            size: 0
                        },
                        xaxis: {
                            type: 'datetime',
                            axisBorder: {
                                color: isDark ? '#191e3a' : '#e0e6ed'
                            },
                        },
                        yaxis: {
                            title: {
                                text: 'Points',
                            },
                            min: 0,
                            opposite: isRtl ? true : false,
                            labels: {
                                offsetX: isRtl ? -10 : 0,
                            }
                        },
                        grid: {
                            borderColor: isDark ? '#191e3a' : '#e0e6ed',
                        },
                        tooltip: {
                            shared: true,
                            intersect: false,
                            theme: isDark ? 'dark' : 'light',
                            y: {
                                formatter: (y) =&gt; {
                                    if (typeof y !== &quot;undefined&quot;) {
                                        return y.toFixed(0) + &quot; points&quot;;
                                    }
                                    return y;
                                }
                            }
                        },
                        legend: {
                            itemMargin: {
                                horizontal: 4,
                                vertical: 8
                            }
                        }
                    }
                },

                this.$watch('$store.app.theme', () =&gt; {
                    isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;
                    mixedChart.updateOptions(this.mixedChartOptions);
                })
            },
        }));
    });
&lt;/script&gt;
</pre>
                </template>
            </div>

            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white">Basic Radar</h5>
                    <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                        href="javascript:;" @click="toggleCode('code7')"><span class="flex items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                <path
                                    d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" />
                                <path
                                    d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                            Code
                        </span>
                    </a>
                </div>
                <div x-ref="radarChart" class="bg-white dark:bg-black rounded-lg overflow-hidden"></div>
                <template x-if="codeArr.includes('code7')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
&lt;!-- basic radar --&gt;
&lt;div x-ref=&quot;radarChart&quot; class=&quot;bg-white dark:bg-black rounded-lg overflow-hidden&quot;&gt;&lt;/div&gt;

&lt;!-- script --&gt;
&lt;script&gt;
    document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
        Alpine.data(&quot;chart&quot;, () =&gt; ({

            init() {
                isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;

                let radarChart = new ApexCharts(this.$refs.radarChart, this.radarChartOptions);
                radarChart.render();

                get radarChartOptions() {
                    return {
                        series: [{
                            name: 'Series 1',
                            data: [80, 50, 30, 40, 100, 20],
                        }],
                        chart: {
                            height: 300,
                            type: 'radar',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ['#4361ee'],
                        xaxis: {
                            categories: ['January', 'February', 'March', 'April', 'May', 'June'],
                        },
                        plotOptions: {
                            radar: {
                                polygons: {
                                    strokeColors: isDark ? '#191e3a' : '#e0e6ed',
                                    connectorColors: isDark ? '#191e3a' : '#e0e6ed',
                                }
                            }
                        },
                        tooltip: {
                            theme: isDark ? 'dark' : 'light',
                        }
                    }
                },

                this.$watch('$store.app.theme', () =&gt; {
                    isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;
                    radarChart.updateOptions(this.radarChartOptions);
                })
            },
        }));
    });
&lt;/script&gt;
</pre>
                </template>
            </div>

            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white">Basic Pie</h5>
                    <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                        href="javascript:;" @click="toggleCode('code8')"><span class="flex items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                <path
                                    d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" />
                                <path
                                    d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                            Code
                        </span>
                    </a>
                </div>
                <div x-ref="pieChart" class="bg-white dark:bg-black rounded-lg overflow-hidden"></div>
                <template x-if="codeArr.includes('code8')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
&lt;!-- basic pie --&gt;
&lt;div x-ref=&quot;pieChart&quot; class=&quot;bg-white dark:bg-black rounded-lg overflow-hidden&quot;&gt;&lt;/div&gt;

&lt;!-- script --&gt;
&lt;script&gt;
    document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
        Alpine.data(&quot;chart&quot;, () =&gt; ({

            init() {
                isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;

                let pieChart = new ApexCharts(this.$refs.pieChart, this.pieChartOptions);
                pieChart.render();

                get pieChartOptions() {
                    return {
                        series: [44, 55, 13, 43, 22],
                        chart: {
                            height: 300,
                            type: 'pie',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
                        colors: ['#4361ee', '#805dca', '#00ab55', '#e7515a', '#e2a03f'],
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                }
                            }
                        }],
                        stroke: {
                            show: false,
                        },
                        legend: {
                            position: 'bottom',
                        }
                    }
                },

                this.$watch('$store.app.theme', () =&gt; {
                    isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;
                    pieChart.updateOptions(this.pieChartOptions);
                })
            },
        }));
    });
&lt;/script&gt;
</pre>
                </template>
            </div>

            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white">Basic Donut</h5>
                    <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                        href="javascript:;" @click="toggleCode('code9')"><span class="flex items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                <path
                                    d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" />
                                <path
                                    d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                            Code
                        </span>
                    </a>
                </div>
                <div x-ref="donutChart" class="bg-white dark:bg-black rounded-lg overflow-hidden"></div>
                <template x-if="codeArr.includes('code9')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
&lt;!-- basic donut --&gt;
&lt;div x-ref=&quot;donutChart&quot; class=&quot;bg-white dark:bg-black rounded-lg overflow-hidden&quot;&gt;&lt;/div&gt;

&lt;!-- script --&gt;
&lt;script&gt;
    document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
        Alpine.data(&quot;chart&quot;, () =&gt; ({

            init() {
                isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;

                let donutChart = new ApexCharts(this.$refs.donutChart, this.donutChartOptions);
                donutChart.render();

                get donutChartOptions() {
                    return {
                        series: [44, 55, 13],
                        chart: {
                            height: 300,
                            type: 'donut',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        stroke: {
                            show: false,
                        },
                        labels: ['Team A', 'Team B', 'Team C'],
                        colors: ['#4361ee', '#805dca', '#e2a03f'],
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                }
                            }
                        }],
                        legend: {
                            position: 'bottom',
                        },
                    }
                },

                this.$watch('$store.app.theme', () =&gt; {
                    isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;
                    donutChart.updateOptions(this.donutChartOptions);
                })
            },
        }));
    });
&lt;/script&gt;
</pre>
                </template>
            </div>

            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white">Basic Polar Area</h5>
                    <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                        href="javascript:;" @click="toggleCode('code10')"><span class="flex items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                <path
                                    d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" />
                                <path
                                    d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                            Code
                        </span>
                    </a>
                </div>
                <div x-ref="polarAreaChart" class="bg-white dark:bg-black rounded-lg overflow-hidden"></div>
                <template x-if="codeArr.includes('code10')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
&lt;!-- basic polar area --&gt;
&lt;div x-ref=&quot;polarAreaChart&quot; class=&quot;bg-white dark:bg-black rounded-lg overflow-hidden&quot;&gt;&lt;/div&gt;

&lt;!-- script --&gt;
&lt;script&gt;
    document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
        Alpine.data(&quot;chart&quot;, () =&gt; ({

            init() {
                isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;

                let polarAreaChart = new ApexCharts(this.$refs.polarAreaChart, this.polarAreaChartOptions);
                polarAreaChart.render();

                get polarAreaChartOptions() {
                    return {
                        series: [14, 23, 21, 17, 15, 10, 12, 17, 21],
                        chart: {
                            height: 300,
                            type: 'polarArea',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ['#4361ee', '#805dca', '#00ab55', '#e7515a', '#e2a03f', '#2196f3', '#3b3f5c'],
                        stroke: {
                            show: false,
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                }
                            }
                        }],
                        plotOptions: {
                            polarArea: {
                                rings: {
                                    strokeColor: isDark ? '#191e3a' : '#e0e6ed',
                                },
                                spokes: {
                                    connectorColors: isDark ? '#191e3a' : '#e0e6ed',
                                }
                            }
                        },
                        legend: {
                            position: 'bottom',
                        },
                        fill: {
                            opacity: 0.85
                        }
                    }
                },

                this.$watch('$store.app.theme', () =&gt; {
                    isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;
                    polarAreaChart.updateOptions(this.polarAreaChartOptions);
                })
            },
        }));
    });
&lt;/script&gt;
</pre>
                </template>
            </div>

            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white">Radial Bar</h5>
                    <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                        href="javascript:;" @click="toggleCode('code11')"><span class="flex items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                <path
                                    d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" />
                                <path
                                    d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                            Code
                        </span>
                    </a>
                </div>
                <div x-ref="radialBarChart" class="bg-white dark:bg-black rounded-lg overflow-hidden"></div>
                <template x-if="codeArr.includes('code11')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
&lt;!-- radial bar --&gt;
&lt;div x-ref=&quot;radialBarChart&quot; class=&quot;bg-white dark:bg-black rounded-lg overflow-hidden&quot;&gt;&lt;/div&gt;

&lt;!-- script --&gt;
&lt;script&gt;
    document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
        Alpine.data(&quot;chart&quot;, () =&gt; ({

            init() {
                isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;

                let radialBarChart = new ApexCharts(this.$refs.radialBarChart, this.radialBarChartOptions);
                radialBarChart.render();

                get radialBarChartOptions() {
                    return {
                        series: [44, 55, 41],
                        chart: {
                            height: 300,
                            type: 'radialBar',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ['#4361ee', '#805dca', '#e2a03f'],
                        grid: {
                            borderColor: isDark ? '#191e3a' : '#e0e6ed',
                        },
                        plotOptions: {
                            radialBar: {
                                dataLabels: {
                                    name: {
                                        fontSize: '22px',
                                    },
                                    value: {
                                        fontSize: '16px',
                                    },
                                    total: {
                                        show: true,
                                        label: 'Total',
                                        formatter: function(w) {
                                            return 249
                                        }
                                    }
                                }
                            }
                        },
                        labels: ['Apples', 'Oranges', 'Bananas'],
                        fill: {
                            opacity: 0.85
                        }
                    }
                },

                this.$watch('$store.app.theme', () =&gt; {
                    isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;
                    radialBarChart.updateOptions(this.radialBarChartOptions);
                })
            },
        }));
    });
&lt;/script&gt;
</pre>
                </template>
            </div>

            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white">Bubble Chart</h5>
                    <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                        href="javascript:;" @click="toggleCode('code12')"><span class="flex items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                <path
                                    d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" />
                                <path
                                    d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                            Code
                        </span>
                    </a>
                </div>
                <div x-ref="bubbleChart" class="bg-white dark:bg-black rounded-lg overflow-hidden"></div>
                <template x-if="codeArr.includes('code12')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
&lt;!-- bubble chart --&gt;
&lt;div x-ref=&quot;bubbleChart&quot; class=&quot;bg-white dark:bg-black rounded-lg overflow-hidden&quot;&gt;&lt;/div&gt;

&lt;!-- script --&gt;
&lt;script&gt;
    document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
        Alpine.data(&quot;chart&quot;, () =&gt; ({

            init() {
                isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;

                let bubbleChart = new ApexCharts(this.$refs.bubbleChart, this.bubbleChartOptions);
                bubbleChart.render();

                get bubbleChartOptions() {
                    return {
                        series: [{
                                name: 'Bubble1',
                                data: this.generateData(new Date('11 Feb 2017 GMT').getTime(), 20, {
                                    min: 10,
                                    max: 60
                                })
                            },
                            {
                                name: 'Bubble2',
                                data: this.generateData(new Date('11 Feb 2017 GMT').getTime(), 20, {
                                    min: 10,
                                    max: 60
                                })
                            },
                        ],
                        chart: {
                            height: 300,
                            type: 'bubble',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ['#4361ee', '#00ab55'],
                        dataLabels: {
                            enabled: false
                        },
                        xaxis: {
                            tickAmount: 12,
                            type: 'category',
                            axisBorder: {
                                color: isDark ? '#191e3a' : '#e0e6ed'
                            },
                        },
                        yaxis: {
                            max: 70,
                            opposite: isRtl ? true : false,
                            labels: {
                                offsetX: isRtl ? -10 : 0,
                            }
                        },
                        grid: {
                            borderColor: isDark ? '#191e3a' : '#e0e6ed',
                        },
                        tooltip: {
                            theme: isDark ? 'dark' : 'light',
                        },
                        stroke: {
                            colors: isDark ? ['#191e3a'] : ['#e0e6ed'],
                        },
                        fill: {
                            opacity: 0.85
                        }
                    }
                },

                this.$watch('$store.app.theme', () =&gt; {
                    isDark = this.$store.app.theme === &quot;dark&quot; ? true : false;
                    bubbleChart.updateOptions(this.bubbleChartOptions);
                })
            },
        }));
    });
&lt;/script&gt;
</pre>
                </template>
            </div>
        </div>
    </div>

    <!-- start hightlight js -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
    <script src="/assets/js/highlight.min.js"></script>
    <!-- end hightlight js -->

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("chart", () => ({
                // highlightjs
                codeArr: [],
                toggleCode(name) {
                    if (this.codeArr.includes(name)) {
                        this.codeArr = this.codeArr.filter((d) => d != name);
                    } else {
                        this.codeArr.push(name);

                        setTimeout(() => {
                            document.querySelectorAll('pre.code').forEach(el => {
                                hljs.highlightElement(el);
                            });
                        });
                    }
                },

                lineChart: null,
                areaChart: null,
                columnChart: null,
                simpleColumnStacked: null,
                barChart: null,
                mixedChart: null,
                radarChart: null,
                pieChart: null,
                donutChart: null,
                polarAreaChart: null,
                radialBarChart: null,
                bubbleChart: null,

                init() {
                    isDark = this.$store.app.theme === "dark" || this.$store.app.isDarkMode ? true :
                        false;
                    isRtl = this.$store.app.rtlClass === "rtl" ? true : false;

                    setTimeout(() => {
                        this.lineChart = new ApexCharts(this.$refs.lineChart, this
                            .lineChartOptions);
                        this.lineChart.render();

                        this.areaChart = new ApexCharts(this.$refs.areaChart, this
                            .areaChartOptions);
                        this.areaChart.render();

                        this.columnChart = new ApexCharts(this.$refs.columnChart, this
                            .columnChartOptions);
                        this.columnChart.render();

                        this.simpleColumnStacked = new ApexCharts(this.$refs
                            .simpleColumnStacked, this.simpleColumnStackedOptions);
                        this.simpleColumnStacked.render();

                        this.barChart = new ApexCharts(this.$refs.barChart, this
                            .barChartOptions);
                        this.barChart.render();

                        this.mixedChart = new ApexCharts(this.$refs.mixedChart, this
                            .mixedChartOptions);
                        this.mixedChart.render();

                        this.radarChart = new ApexCharts(this.$refs.radarChart, this
                            .radarChartOptions);
                        this.radarChart.render();

                        this.pieChart = new ApexCharts(this.$refs.pieChart, this
                            .pieChartOptions);
                        this.pieChart.render();

                        this.donutChart = new ApexCharts(this.$refs.donutChart, this
                            .donutChartOptions);
                        this.donutChart.render();

                        this.polarAreaChart = new ApexCharts(this.$refs.polarAreaChart, this
                            .polarAreaChartOptions);
                        this.polarAreaChart.render();

                        this.radialBarChart = new ApexCharts(this.$refs.radialBarChart, this
                            .radialBarChartOptions);
                        this.radialBarChart.render();

                        this.bubbleChart = new ApexCharts(this.$refs.bubbleChart, this
                            .bubbleChartOptions);
                        this.bubbleChart.render();
                    }, 300);

                    this.$watch('$store.app.theme', () => {
                        this.refreshOptions();
                    })

                    this.$watch('$store.app.rtlClass', () => {
                        this.refreshOptions();
                    })

                },

                refreshOptions() {
                    isDark = this.$store.app.theme === "dark" || this.$store.app.isDarkMode ? true :
                        false;
                    isRtl = this.$store.app.rtlClass === "rtl" ? true : false;
                    this.lineChart.updateOptions(this.lineChartOptions);
                    this.areaChart.updateOptions(this.areaChartOptions);
                    this.columnChart.updateOptions(this.columnChartOptions);
                    this.simpleColumnStacked.updateOptions(this.simpleColumnStackedOptions);
                    this.barChart.updateOptions(this.barChartOptions);
                    this.mixedChart.updateOptions(this.mixedChartOptions);
                    this.radarChart.updateOptions(this.radarChartOptions);
                    this.pieChart.updateOptions(this.pieChartOptions);
                    this.donutChart.updateOptions(this.donutChartOptions);
                    this.polarAreaChart.updateOptions(this.polarAreaChartOptions);
                    this.radialBarChart.updateOptions(this.radialBarChartOptions);
                    this.bubbleChart.updateOptions(this.bubbleChartOptions);
                },

                get lineChartOptions() {
                    return {
                        chart: {
                            height: 300,
                            type: 'line',
                            toolbar: false
                        },
                        colors: ['#4361ee'],
                        tooltip: {
                            marker: false,
                            y: {
                                formatter(number) {
                                    return '$' + number
                                }
                            }
                        },
                        stroke: {
                            width: 2,
                            curve: 'smooth'
                        },
                        xaxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June'],
                            axisBorder: {
                                color: isDark ? '#191e3a' : '#e0e6ed'
                            },
                        },
                        yaxis: {
                            opposite: isRtl ? true : false,
                            labels: {
                                offsetX: isRtl ? -20 : 0,
                            }
                        },
                        series: [{
                            name: 'Sales',
                            data: [45, 55, 75, 25, 45, 110],
                        }],
                        grid: {
                            borderColor: isDark ? '#191e3a' : '#e0e6ed',
                        },
                        tooltip: {
                            theme: isDark ? 'dark' : 'light',
                        }
                    }
                },

                get areaChartOptions() {
                    return {
                        series: [{
                            name: 'Income',
                            data: [16800, 16800, 15500, 17800, 15500, 17000, 19000, 16000,
                                15000, 17000, 14000, 17000
                            ]
                        }],
                        chart: {
                            type: 'area',
                            height: 300,
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ['#805dca'],
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            width: 2,
                            curve: 'smooth'
                        },
                        xaxis: {
                            axisBorder: {
                                color: isDark ? '#191e3a' : '#e0e6ed'
                            },
                        },
                        yaxis: {
                            opposite: isRtl ? true : false,
                            labels: {
                                offsetX: isRtl ? -40 : 0,
                            }
                        },
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep',
                            'Oct', 'Nov', 'Dec'
                        ],
                        legend: {
                            horizontalAlign: 'left'
                        },
                        grid: {
                            borderColor: isDark ? '#191e3a' : '#e0e6ed',
                        },
                        tooltip: {
                            theme: isDark ? 'dark' : 'light',
                        }
                    }
                },

                get columnChartOptions() {
                    return {
                        series: [{
                            name: 'Net Profit',
                            data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
                        }, {
                            name: 'Revenue',
                            data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
                        }],
                        chart: {
                            height: 300,
                            type: 'bar',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ['#805dca', '#e7515a'],
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            width: 2,
                            colors: ['transparent']
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '55%',
                                endingShape: 'rounded'
                            },
                        },
                        grid: {
                            borderColor: isDark ? '#191e3a' : '#e0e6ed'
                        },
                        xaxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug',
                                'Sep', 'Oct'
                            ],
                            axisBorder: {
                                color: isDark ? '#191e3a' : '#e0e6ed'
                            },
                        },
                        yaxis: {
                            opposite: isRtl ? true : false,
                            labels: {
                                offsetX: isRtl ? -10 : 0,
                            }
                        },
                        tooltip: {
                            theme: isDark ? 'dark' : 'light',
                            y: {
                                formatter: function(val) {
                                    return val;
                                },
                            },
                        },
                    }
                },

                get simpleColumnStackedOptions() {
                    return {
                        series: [{
                                name: 'PRODUCT A',
                                data: [44, 55, 41, 67, 22, 43]
                            },
                            {
                                name: 'PRODUCT B',
                                data: [13, 23, 20, 8, 13, 27]
                            },
                        ],
                        chart: {
                            height: 300,
                            type: 'bar',
                            stacked: true,
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ['#2196f3', '#3b3f5c'],
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                legend: {
                                    position: 'bottom',
                                    offsetX: -10,
                                    offsetY: 5
                                }
                            }
                        }],
                        plotOptions: {
                            bar: {
                                horizontal: false
                            }
                        },
                        xaxis: {
                            type: 'datetime',
                            categories: ['01/01/2011 GMT', '01/02/2011 GMT', '01/03/2011 GMT',
                                '01/04/2011 GMT', '01/05/2011 GMT', '01/06/2011 GMT'
                            ],
                            axisBorder: {
                                color: isDark ? '#191e3a' : '#e0e6ed'
                            },
                        },
                        yaxis: {
                            opposite: isRtl ? true : false,
                            labels: {
                                offsetX: isRtl ? -20 : 0,
                            }
                        },
                        grid: {
                            borderColor: isDark ? '#191e3a' : '#e0e6ed'
                        },
                        legend: {
                            position: 'right',
                            offsetY: 40
                        },
                        tooltip: {
                            theme: isDark ? 'dark' : 'light'
                        },
                        fill: {
                            opacity: 0.8
                        }
                    }
                },

                get barChartOptions() {
                    return {
                        series: [{
                            name: 'Sales',
                            data: [44, 55, 41, 67, 22, 43, 21, 70]
                        }],
                        chart: {
                            height: 300,
                            type: 'bar',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            width: 1
                        },
                        colors: ['#4361ee'],
                        xaxis: {
                            categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat'],
                            axisBorder: {
                                color: isDark ? '#191e3a' : '#e0e6ed'
                            },
                        },
                        yaxis: {
                            opposite: isRtl ? true : false,
                            reversed: isRtl ? true : false,
                        },
                        grid: {
                            borderColor: isDark ? '#191e3a' : '#e0e6ed',
                        },
                        plotOptions: {
                            bar: {
                                horizontal: true,
                            }
                        },
                        fill: {
                            opacity: 0.8
                        }
                    }
                },

                get mixedChartOptions() {
                    return {
                        series: [{
                                name: 'TEAM A',
                                type: 'column',
                                data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30]
                            }, {
                                name: 'TEAM B',
                                type: 'area',
                                data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
                            },
                            {
                                name: 'TEAM C',
                                type: 'line',
                                data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
                            }
                        ],
                        chart: {
                            height: 300,
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ['#2196f3', '#00ab55', '#4361ee'],
                        stroke: {
                            width: [0, 2, 2],
                            curve: 'smooth'
                        },
                        plotOptions: {
                            bar: {
                                columnWidth: '50%'
                            }
                        },
                        fill: {
                            opacity: [1, 0.25, 1],
                        },

                        labels: ['01/01/2022', '02/01/2022', '03/01/2022', '04/01/2022',
                            '05/01/2022', '06/01/2022', '07/01/2022',
                            '08/01/2022', '09/01/2022', '10/01/2022', '11/01/2022'
                        ],
                        markers: {
                            size: 0
                        },
                        xaxis: {
                            type: 'datetime',
                            axisBorder: {
                                color: isDark ? '#191e3a' : '#e0e6ed'
                            },
                        },
                        yaxis: {
                            title: {
                                text: 'Points',
                            },
                            min: 0,
                            opposite: isRtl ? true : false,
                            labels: {
                                offsetX: isRtl ? -10 : 0,
                            }
                        },
                        grid: {
                            borderColor: isDark ? '#191e3a' : '#e0e6ed',
                        },
                        tooltip: {
                            shared: true,
                            intersect: false,
                            theme: isDark ? 'dark' : 'light',
                            y: {
                                formatter: (y) => {
                                    if (typeof y !== "undefined") {
                                        return y.toFixed(0) + " points";
                                    }
                                    return y;
                                }
                            }
                        },
                        legend: {
                            itemMargin: {
                                horizontal: 4,
                                vertical: 8
                            }
                        }
                    }
                },

                get radarChartOptions() {
                    return {
                        series: [{
                            name: 'Series 1',
                            data: [80, 50, 30, 40, 100, 20],
                        }],
                        chart: {
                            height: 300,
                            type: 'radar',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ['#4361ee'],
                        xaxis: {
                            categories: ['January', 'February', 'March', 'April', 'May', 'June'],
                        },
                        plotOptions: {
                            radar: {
                                polygons: {
                                    strokeColors: isDark ? '#191e3a' : '#e0e6ed',
                                    connectorColors: isDark ? '#191e3a' : '#e0e6ed',
                                }
                            }
                        },
                        tooltip: {
                            theme: isDark ? 'dark' : 'light',
                        }
                    }
                },

                get pieChartOptions() {
                    return {
                        series: [44, 55, 13, 43, 22],
                        chart: {
                            height: 300,
                            type: 'pie',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
                        colors: ['#4361ee', '#805dca', '#00ab55', '#e7515a', '#e2a03f'],
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                }
                            }
                        }],
                        stroke: {
                            show: false,
                        },
                        legend: {
                            position: 'bottom',
                        }
                    }
                },

                get donutChartOptions() {
                    return {
                        series: [44, 55, 13],
                        chart: {
                            height: 300,
                            type: 'donut',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        stroke: {
                            show: false,
                        },
                        labels: ['Team A', 'Team B', 'Team C'],
                        colors: ['#4361ee', '#805dca', '#e2a03f'],
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                }
                            }
                        }],
                        legend: {
                            position: 'bottom',
                        },
                    }
                },

                get polarAreaChartOptions() {
                    return {
                        series: [14, 23, 21, 17, 15, 10, 12, 17, 21],
                        chart: {
                            height: 300,
                            type: 'polarArea',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ['#4361ee', '#805dca', '#00ab55', '#e7515a', '#e2a03f', '#2196f3',
                            '#3b3f5c'
                        ],
                        stroke: {
                            show: false,
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                }
                            }
                        }],
                        plotOptions: {
                            polarArea: {
                                rings: {
                                    strokeColor: isDark ? '#191e3a' : '#e0e6ed',
                                },
                                spokes: {
                                    connectorColors: isDark ? '#191e3a' : '#e0e6ed',
                                }
                            }
                        },
                        legend: {
                            position: 'bottom',
                        },
                        fill: {
                            opacity: 0.85
                        }
                    }
                },

                get radialBarChartOptions() {
                    return {
                        series: [44, 55, 41],
                        chart: {
                            height: 300,
                            type: 'radialBar',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ['#4361ee', '#805dca', '#e2a03f'],
                        grid: {
                            borderColor: isDark ? '#191e3a' : '#e0e6ed',
                        },
                        plotOptions: {
                            radialBar: {
                                dataLabels: {
                                    name: {
                                        fontSize: '22px',
                                    },
                                    value: {
                                        fontSize: '16px',
                                    },
                                    total: {
                                        show: true,
                                        label: 'Total',
                                        formatter: function(w) {
                                            return 249
                                        }
                                    }
                                }
                            }
                        },
                        labels: ['Apples', 'Oranges', 'Bananas'],
                        fill: {
                            opacity: 0.85
                        }
                    }
                },

                get bubbleChartOptions() {
                    return {
                        series: [{
                                name: 'Bubble1',
                                data: this.generateData(new Date('11 Feb 2017 GMT').getTime(),
                                    20, {
                                        min: 10,
                                        max: 60
                                    })
                            },
                            {
                                name: 'Bubble2',
                                data: this.generateData(new Date('11 Feb 2017 GMT').getTime(),
                                    20, {
                                        min: 10,
                                        max: 60
                                    })
                            },
                        ],
                        chart: {
                            height: 300,
                            type: 'bubble',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ['#4361ee', '#00ab55'],
                        dataLabels: {
                            enabled: false
                        },
                        xaxis: {
                            tickAmount: 12,
                            type: 'category',
                            axisBorder: {
                                color: isDark ? '#191e3a' : '#e0e6ed'
                            },
                        },
                        yaxis: {
                            max: 70,
                            opposite: isRtl ? true : false,
                            labels: {
                                offsetX: isRtl ? -10 : 0,
                            }
                        },
                        grid: {
                            borderColor: isDark ? '#191e3a' : '#e0e6ed',
                        },
                        tooltip: {
                            theme: isDark ? 'dark' : 'light',
                        },
                        stroke: {
                            colors: isDark ? ['#191e3a'] : ['#e0e6ed'],
                        },
                        fill: {
                            opacity: 0.85
                        }
                    }
                },

                generateData(baseval, count, yrange) {
                    var i = 0;
                    var series = [];
                    while (i < count) {
                        var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;;
                        var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
                        var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;

                        series.push([x, y, z]);
                        baseval += 86400000;
                        i++;
                    }
                    return series;
                }
            }));
        });
    </script>
</x-layout.default>
