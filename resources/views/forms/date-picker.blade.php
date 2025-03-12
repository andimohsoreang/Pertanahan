<x-layout.default>


    <link rel="stylesheet" href="{{ Vite::asset('resources/css/flatpickr.min.css') }}">
    <script src="/assets/js/flatpickr.js"></script>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/nouislider.min.css') }}">
    <script src="/assets/js/nouislider.min.js"></script>

    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Forms</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Date and Range Picker</span>
            </li>
        </ul>
        <div class="pt-5 space-y-8" x-data="form">

            <div class="bg-[#009688]/[.26] text-[#009688] py-1 px-2 rounded inline-block text-base">Date and Time Picker
            </div>
            <div class="panel p-3 flex items-center text-primary overflow-x-auto whitespace-nowrap">
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
                <span class="ltr:mr-3 rtl:ml-3">Documentation: </span><a href="https://www.npmjs.com/package/flatpickr"
                    target="_blank" class="block hover:underline">https://www.npmjs.com/package/flatpickr</a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Basic -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Basic</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code1')">
                            <span class="flex items-center">

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
                    <div class="mb-5">
                        <input id="basic" x-model="date1" class="form-input" />
                    </div>
                    <template x-if="codeArr.includes('code1')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- basic --&gt;
    &lt;div x-data=&quot;form&quot;&gt;
        &lt;input id=&quot;basic&quot; x-model=&quot;date1&quot; class=&quot;form-input&quot; /&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;form&quot;, () =&gt; ({
                date1: '2022-07-05',
                init() {
                    flatpickr(document.getElementById('basic'), {
                        dateFormat: 'Y-m-d',
                        defaultDate: this.date1,
                    })
                }
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- Date & time -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Date Time</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code2')">
                            <span class="flex items-center">

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
                    <div class="mb-2.5">Use <code class="text-danger">{enableTime: true, dateFormat: 'Y-m-d H:i'}</code>
                        option to enable time support</div>
                    <div class="mb-5">
                        <input id="dateTime" x-model="date2" class="form-input" />
                    </div>
                    <template x-if="codeArr.includes('code2')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- date & time --&gt;
    &lt;div x-data=&quot;form&quot;&gt;
        &lt;input id=&quot;dateTime&quot; x-model=&quot;date2&quot; class=&quot;form-input&quot; /&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;form&quot;, () =&gt; ({
                date2: '2022-07-05 12:00',
                init() {
                    flatpickr(document.getElementById('dateTime'), {
                        defaultDate: this.date2,
                        enableTime: true,
                        dateFormat: 'Y-m-d H:i'
                    })
                }
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- range-calendar -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Range Calendar</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code3')">
                            <span class="flex items-center">

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
                    <div class="mb-2.5">Use <code class="text-danger">{mode: 'range'}</code> select the date with
                        range.</div>
                    <div class="mb-5">
                        <input id="range-calendar" x-model="date3" class="form-input" />
                    </div>
                    <template x-if="codeArr.includes('code3')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- range calendar --&gt;
    &lt;div x-data=&quot;form&quot;&gt;
        &lt;input id=&quot;range-calendar&quot; x-model=&quot;date3&quot; class=&quot;form-input&quot; /&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;form&quot;, () =&gt; ({
                date3: '2022-07-05 to 2022-07-10',
                init() {
                    flatpickr(document.getElementById('range-calendar'), {
                        defaultDate: this.date3,
                        dateFormat: 'Y-m-d',
                        mode: 'range'
                    })
                }
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- preloading time -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Preloading Time</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code4')">
                            <span class="flex items-center">

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
                    <div class="mb-2.5">Use <code class="text-danger">{noCalendar: true, enableTime: true, dateFormat:
                            'H:i'}</code> with Date Time options to disable calendar and show time picker only.</div>
                    <div class="mb-5">
                        <input id="preloading-time" x-model="date4" class="form-input" />
                    </div>
                    <template x-if="codeArr.includes('code4')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- preloading time --&gt;
    &lt;div x-data=&quot;form&quot;&gt;
        &lt;input id=&quot;preloading-time&quot; x-model=&quot;date4&quot; class=&quot;form-input&quot; /&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;form&quot;, () =&gt; ({
                date4: '13:45',
                init() {
                    flatpickr(document.getElementById('preloading-time'), {
                        defaultDate: this.date4,
                        noCalendar: true,
                        enableTime: true,
                        dateFormat: 'H:i'
                    })
                }
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>
            </div>

            <!-- range picker -->
            <div class="bg-[#009688]/[.26] text-[#009688] py-1 px-2 rounded inline-block text-base">Javascript Range
                Slider</div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- Top-Left -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Postion : Top-Left</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code5')">
                            <span class="flex items-center">

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
                    <div class="mb-5">
                        <div class="font-bold"> <span x-text="slider1"
                                class="inline-block py-1 px-2 rounded text-primary border border-white-light dark:border-dark"></span>
                            <span>%</span></div>
                        <input type="range" class="w-full py-2.5" min="0" max="100"
                            x-model="slider1" />
                    </div>
                    <template x-if="codeArr.includes('code5')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- top left --&gt;
    &lt;div x-data=&quot;form&quot;&gt;
        &lt;div class=&quot;font-bold&quot;&gt; &lt;span x-text=&quot;slider1&quot; class=&quot;inline-block py-1 px-2 rounded text-primary border border-white-light dark:border-dark&quot;&gt;&lt;/span&gt; &lt;span&gt;%&lt;/span&gt;&lt;/div&gt;
        &lt;input type=&quot;range&quot; class=&quot;w-full py-2.5&quot; min=&quot;0&quot; max=&quot;100&quot; x-model=&quot;slider1&quot; /&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;form&quot;, () =&gt; ({
                slider1: '0',
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- Top-right -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Postion : Top-right</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code6')">
                            <span class="flex items-center">

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
                    <div class="mb-5">
                        <div class="font-bold ltr:text-right rtl:text-left"> <span x-text="slider2"
                                class="inline-block py-1 px-2 rounded text-primary border border-white-light dark:border-dark"></span>
                            <span>%</span></div>
                        <input type="range" class="w-full py-2.5" min="0" max="100"
                            x-model="slider2" />
                    </div>
                    <template x-if="codeArr.includes('code6')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- top right --&gt;
    &lt;div x-data=&quot;form&quot;&gt;
        &lt;div class=&quot;font-bold ltr:text-right rtl:text-left&quot;&gt; &lt;span x-text=&quot;slider2&quot; class=&quot;inline-block py-1 px-2 rounded text-primary border border-white-light dark:border-dark&quot;&gt;&lt;/span&gt; &lt;span&gt;%&lt;/span&gt;&lt;/div&gt;
        &lt;input type=&quot;range&quot; class=&quot;w-full py-2.5&quot; min=&quot;0&quot; max=&quot;100&quot; x-model=&quot;slider2&quot; /&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;form&quot;, () =&gt; ({
                slider2: '0',
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- bottom-left -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Postion : Bottom-Left</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code7')">
                            <span class="flex items-center">

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
                    <div class="mb-5">
                        <input type="range" class="w-full py-2.5" min="0" max="100"
                            x-model="slider3" />
                        <div class="font-bold"> <span x-text="slider3"
                                class="inline-block py-1 px-2 rounded text-primary border border-white-light dark:border-dark"></span>
                            <span>%</span></div>
                    </div>
                    <template x-if="codeArr.includes('code7')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- bottom left --&gt;
    &lt;div x-data=&quot;form&quot;&gt;
        &lt;input type=&quot;range&quot; class=&quot;w-full py-2.5&quot; min=&quot;0&quot; max=&quot;100&quot; x-model=&quot;slider3&quot; /&gt;
        &lt;div class=&quot;font-bold&quot;&gt; &lt;span x-text=&quot;slider3&quot; class=&quot;inline-block py-1 px-2 rounded text-primary border border-white-light dark:border-dark&quot;&gt;&lt;/span&gt; &lt;span&gt;%&lt;/span&gt;&lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;form&quot;, () =&gt; ({
                slider3: '0',
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- Bottom-right -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Postion : Bottom-right</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code8')">
                            <span class="flex items-center">

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
                    <div class="mb-5">
                        <input type="range" class="w-full py-2.5" min="0" max="100"
                            x-model="slider4" />
                        <div class="font-bold ltr:text-right rtl:text-left"> <span x-text="slider4"
                                class="inline-block py-1 px-2 rounded text-primary border border-white-light dark:border-dark"></span>
                            <span>%</span></div>
                    </div>
                    <template x-if="codeArr.includes('code8')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- bottom right --&gt;
    &lt;div x-data=&quot;form&quot;&gt;
        &lt;input type=&quot;range&quot; class=&quot;w-full py-2.5&quot; min=&quot;0&quot; max=&quot;100&quot; x-model=&quot;slider4&quot; /&gt;
        &lt;div class=&quot;font-bold ltr:text-right rtl:text-left&quot;&gt; &lt;span x-text=&quot;slider4&quot; class=&quot;inline-block py-1 px-2 rounded text-primary border border-white-light dark:border-dark&quot;&gt;&lt;/span&gt; &lt;span&gt;%&lt;/span&gt;&lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;form&quot;, () =&gt; ({
                slider4: '0',
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>
            </div>

            <!-- Nouislider -->
            <div class="bg-[#009688]/[.26] text-[#009688] py-1 px-2 rounded inline-block text-base">noUI Slider</div>
            <div class="panel p-3 flex items-center text-primary overflow-x-auto whitespace-nowrap">
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
                <span class="ltr:mr-3 rtl:ml-3">Documentation: </span><a
                    href="https://www.npmjs.com/package/nouislider" target="_blank"
                    class="block hover:underline">https://www.npmjs.com/package/nouislider</a>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- Using HTML5 input elements -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Using HTML5 input elements</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code10')">
                            <span class="flex items-center">

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
                    <div class="mb-5 pt-5">
                        <div class="mt-5" id="noui_slider1"></div>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 my-4">
                            <div class="mb-3">
                                <select x-model="nouiMin1" class="form-select w-full" id="select"
                                    @change="selectUpdateValue()">
                                    <template x-for="(i, index) in 100" x-model="nouiMin1">
                                        <option :key="i" x-text="index"></option>
                                    </template>
                                </select>
                            </div>
                            <div>
                                <input type="number" id="input" x-model="nouiMax1" class="form-input"
                                    :min="-20" :max="100" step="1"
                                    @change="selectUpdateValue()" />
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code10')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- using HTML5 input elements --&gt;
    &lt;div x-data=&quot;form&quot;&gt;
        &lt;div class=&quot;mt-5&quot; id=&quot;nouiSlider1&quot;&gt;&lt;/div&gt;
        &lt;div class=&quot;grid grid-cols-1 lg:grid-cols-2 gap-8 my-4&quot;&gt;
            &lt;div class=&quot;mb-3&quot;&gt;
                &lt;select x-model=&quot;nouiMin1&quot; class=&quot;form-select w-full&quot; id=&quot;select&quot; @change=&quot;selectUpdateValue()&quot;&gt;
                    &lt;template x-for=&quot;(i, index) in 61&quot; x-model=&quot;nouiMin1&quot;&gt;
                        &lt;option :key=&quot;i&quot; x-text=&quot;index&quot;&gt;&lt;/option&gt;
                    &lt;/template&gt;
                &lt;/select&gt;
            &lt;/div&gt;
            &lt;div&gt;
                &lt;input type=&quot;number&quot; id=&quot;input&quot; x-model=&quot;nouiMax1&quot; class=&quot;form-input&quot; :min=&quot;-20&quot; :max=&quot;100&quot; step=&quot;1&quot; @change=&quot;selectUpdateValue()&quot; /&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;form&quot;, () =&gt; ({
                nouiMin1: 20,
                nouiMax1: 40,
                init() {
                    noUiSlider1 = noUiSlider.create(document.getElementById('noui_slider1'), {
                        start: [this.nouiMin1, this.nouiMax1],
                        connect: true,
                        tooltips: true,
                        range: {
                            'min': 0,
                            'max': 100
                        },
                    })
                    this.$nextTick(() =&gt; {
                        document.getElementById('select').value = this.nouiMin1;
                    })

                    noUiSlider1.on('update', function(values, handle) {
                        document.getElementById('select').value = Math.round(noUiSlider1.get()[0]);
                        document.getElementById('input').value = Math.round(noUiSlider1.get()[1]);
                    });
                }

                selectUpdateValue() {
                    noUiSlider1.set([this.nouiMin1, this.nouiMax1]);
                },
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- Non linear slider -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Non linear slider</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code11')">
                            <span class="flex items-center">

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
                    <div class="mb-5 pt-5">
                        <div class="mt-5" id="noui_slider2"></div>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 my-5 font-bold">
                            <div>
                                <span class="text-primary mr-2" id="nouiMin2" x-text="nouiMin2"></span><span
                                    class="border border-white-light dark:border-dark py-1 px-2 text-dark dark:text-white-dark rounded"
                                    id="nouiMin2Perc" x-text="nouiMin2Perc"></span>
                            </div>
                            <div class="ltr:text-right rtl:text-left">
                                <span class="text-primary mr-2" id="nouiMax2" x-text="nouiMax2"></span><span
                                    class="border border-white-light dark:border-dark py-1 px-2 text-dark dark:text-white-dark rounded"
                                    id="nouiMax2Perc" x-text="nouiMax2Perc"></span>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code11')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- non linear slider --&gt;
    &lt;div x-data=&quot;form&quot;&gt;
        &lt;div class=&quot;mt-5&quot; id=&quot;nouiSlider2&quot;&gt;&lt;/div&gt;
        &lt;div class=&quot;grid grid-cols-1 lg:grid-cols-2 gap-8 my-5 font-bold&quot;&gt;
            &lt;div&gt;
                &lt;span class=&quot;text-primary mr-2&quot; id=&quot;nouiMin2&quot; x-text=&quot;nouiMin2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;border border-white-light dark:border-dark py-1 px-2 text-dark dark:text-white-dark rounded&quot; id=&quot;nouiMin2Perc&quot; x-text=&quot;nouiMin2Perc&quot;&gt;&lt;/span&gt;
            &lt;/div&gt;
            &lt;div class=&quot;ltr:text-right rtl:text-left&quot;&gt;
                &lt;span class=&quot;text-primary mr-2&quot; id=&quot;nouiMax2&quot; x-text=&quot;nouiMax2&quot;&gt;&lt;/span&gt;&lt;span class=&quot;border border-white-light dark:border-dark py-1 px-2 text-dark dark:text-white-dark rounded&quot; id=&quot;nouiMax2Perc&quot; x-text=&quot;nouiMax2Perc&quot;&gt;&lt;/span&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;form&quot;, () =&gt; ({
                nouiMin2: 500,
                nouiMax2: 4000,
                nouiMin2Perc: 0,
                nouiMax2Perc: 0,
                init() {
                    noUiSlider2 = noUiSlider.create(document.getElementById('noui_slider2'), {
                        start: [this.nouiMin2, this.nouiMax2],
                        connect: true,
                        tooltips: true,
                        range: {
                            'min': 0,
                            'max': 10000,
                            '10%': [500, 500],
                            '50%': [4000, 1000],
                        },
                    })
                    noUiSlider2.on('update', function(values, handle, unencoded, isTap, positions) {
                        document.getElementById('nouiMin2').innerHTML = parseInt(values[0]).toFixed(2);
                        document.getElementById('nouiMax2').innerHTML = parseInt(values[1]).toFixed(2);
                        document.getElementById('nouiMin2Perc').innerHTML = parseInt(positions[0]).toFixed(2) + '%';
                        document.getElementById('nouiMax2Perc').innerHTML = parseInt(positions[1]).toFixed(2) + '%';
                    });
                }
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- Locking slider -->
                <div class="panel lg:col-span-2">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Locking sliders together</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code12')">
                            <span class="flex items-center">

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
                    <div class="mb-5 pt-5">
                        <div class="my-5" id="locking_slider1"></div>
                        <div class="text-primary font-bold mb-10" id="locking_slider1_value"></div>
                        <div class="my-5" id="locking_slider2"></div>
                        <div class="text-primary font-bold mb-10" id="locking_slider2_value"></div>
                        <div class="ltr:text-right rtl:text-left">
                            <button type="button" class="btn btn-primary" id="lockbutton"
                                @click="lockedState = !lockedState" x-text="lockedState ? 'Unlock':'Lock'"> Lock
                            </button>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code12')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- locking sliders together --&gt;
    &lt;div x-data=&quot;form&quot;&gt;
        &lt;div class=&quot;my-5&quot; id=&quot;lockingSlider1&quot;&gt;&lt;/div&gt;
        &lt;div class=&quot;text-primary font-bold mb-10&quot; id=&quot;locking_slider1_value&quot;&gt;&lt;/div&gt;
        &lt;div class=&quot;my-5&quot; id=&quot;lockingSlider2&quot;&gt;&lt;/div&gt;
        &lt;div class=&quot;text-primary font-bold mb-10&quot; id=&quot;locking_slider2_value&quot;&gt;&lt;/div&gt;
        &lt;div class=&quot;ltr:text-right rtl:text-left&quot;&gt;
            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; id=&quot;lockbutton&quot; @click=&quot;lockedState = !lockedState&quot; x-text=&quot;lockedState ? 'Unlock':'Lock'&quot;&gt; Lock &lt;/button&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;form&quot;, () =&gt; ({
                lockedState: false,
                init() {
                    lockingSlider2 = noUiSlider.create(document.getElementById('locking_slider2'), {
                        start: 80,
                        animate: false,
                        range: {
                            min: 0,
                            max: 100
                        }
                    });

                    lockingSlider1.on('update', function(values, handle) {
                        locking_slider1_value.innerHTML = values[handle];
                    });

                    lockingSlider2.on('update', function(values, handle) {
                        locking_slider2_value.innerHTML = values[handle];
                    });

                    this.$nextTick(() =&gt; {
                        let lockedState = this.lockedState
                        this.$watch('lockedState', value =&gt; {
                            lockedState = value
                        })
                        lockingSlider1.on('slide', function(values, handle) {
                            if (!lockedState) return;
                            lockingSlider2.set(values[handle] - (Number(lockingSlider2.get()) - Number(lockingSlider1.get())));
                        });

                        lockingSlider2.on('slide', function(values, handle) {
                            if (!lockedState) return;
                            lockingSlider1.set(values[handle] - (Number(lockingSlider2.get()) - Number(lockingSlider1.get())));
                        });
                    })
                }
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <!-- start hightlight js -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
    <script src="/assets/js/highlight.min.js"></script>
    <!-- end hightlight js -->

    <script>
        //basic
        document.addEventListener("alpine:init", () => {
            Alpine.data("form", () => ({
                date1: '2022-07-05',
                date2: '2022-07-05 12:00',
                date3: '2022-07-05 to 2022-07-10',
                date4: '13:45',
                slider1: '0',
                slider2: '0',
                slider3: '0',
                slider4: '0',
                nouiMin1: 20,
                nouiMax1: 40,
                nouiMin2: 500,
                nouiMax2: 4000,
                nouiMin2Perc: 0,
                nouiMax2Perc: 0,
                lockedState: false,
                init() {
                    this.initDatePicker();
                    // nouislider 1
                    noUiSlider1 = noUiSlider.create(document.getElementById('noui_slider1'), {
                        start: [this.nouiMin1, this.nouiMax1],
                        connect: true,
                        tooltips: true,
                        range: {
                            'min': 0,
                            'max': 100
                        },
                        direction: this.$store.app.rtlClass === "rtl" ? 'rtl' : 'ltr'
                    })
                    this.$nextTick(() => {
                        document.getElementById('select').value = this.nouiMin1;
                    })

                    noUiSlider1.on('update', function(values, handle) {
                        document.getElementById('select').value = Math.round(noUiSlider1.get()[
                            0]);
                        document.getElementById('input').value = Math.round(noUiSlider1.get()[
                            1]);
                    });

                    // noui slider 2
                    noUiSlider2 = noUiSlider.create(document.getElementById('noui_slider2'), {
                        start: [this.nouiMin2, this.nouiMax2],
                        connect: true,
                        tooltips: true,
                        range: {
                            'min': 0,
                            'max': 10000,
                            '10%': [500, 500],
                            '50%': [4000, 1000],
                        },
                        direction: this.$store.app.rtlClass === "rtl" ? 'rtl' : 'ltr'
                    })
                    noUiSlider2.on('update', function(values, handle, unencoded, isTap, positions) {
                        document.getElementById('nouiMin2').innerHTML = parseInt(values[0])
                            .toFixed(2);
                        document.getElementById('nouiMax2').innerHTML = parseInt(values[1])
                            .toFixed(2);
                        document.getElementById('nouiMin2Perc').innerHTML = parseInt(positions[
                            0]).toFixed(2) + '%';
                        document.getElementById('nouiMax2Perc').innerHTML = parseInt(positions[
                            1]).toFixed(2) + '%';
                    });

                    // locking slider
                    lockButton = document.getElementById('lockbutton');
                    // locking slider1
                    lockingSlider1 = noUiSlider.create(document.getElementById('locking_slider1'), {
                        start: 60,
                        animate: false,
                        range: {
                            min: 0,
                            max: 100
                        },
                        direction: this.$store.app.rtlClass === "rtl" ? 'rtl' : 'ltr'
                    });

                    // locking slider2
                    lockingSlider2 = noUiSlider.create(document.getElementById('locking_slider2'), {
                        start: 80,
                        animate: false,
                        range: {
                            min: 0,
                            max: 100
                        },
                        direction: this.$store.app.rtlClass === "rtl" ? 'rtl' : 'ltr'
                    });

                    lockingSlider1.on('update', function(values, handle) {
                        locking_slider1_value.innerHTML = values[handle];
                    });

                    lockingSlider2.on('update', function(values, handle) {
                        locking_slider2_value.innerHTML = values[handle];
                    });

                    this.$nextTick(() => {
                        let lockedState = this.lockedState
                        this.$watch('lockedState', value => {
                            lockedState = value
                        })
                        lockingSlider1.on('slide', function(values, handle) {
                            if (!lockedState) return;
                            lockingSlider2.set(values[handle] - (Number(lockingSlider2
                                .get()) - Number(lockingSlider1.get())));
                        });

                        lockingSlider2.on('slide', function(values, handle) {
                            if (!lockedState) return;
                            lockingSlider1.set(values[handle] - (Number(lockingSlider2
                                .get()) - Number(lockingSlider1.get())));
                        });
                    })

                    this.$watch('$store.app.rtlClass', () => {
                        this.initDatePicker();
                    });
                },

                initDatePicker() {
                    // basic
                    flatpickr(document.getElementById('basic'), {
                        dateFormat: 'Y-m-d',
                        defaultDate: this.date1,
                        position: this.$store.app.rtlClass === 'rtl' ? 'auto right' :
                            'auto left'
                    })
                    // date-time
                    flatpickr(document.getElementById('dateTime'), {
                        defaultDate: this.date2,
                        enableTime: true,
                        dateFormat: 'Y-m-d H:i',
                        position: this.$store.app.rtlClass === 'rtl' ? 'auto right' :
                            'auto left'
                    })
                    // range calendar
                    flatpickr(document.getElementById('range-calendar'), {
                        defaultDate: this.date3,
                        dateFormat: 'Y-m-d',
                        mode: 'range',
                        position: this.$store.app.rtlClass === 'rtl' ? 'auto right' :
                            'auto left'
                    })
                    // Preloading time
                    flatpickr(document.getElementById('preloading-time'), {
                        defaultDate: this.date4,
                        noCalendar: true,
                        enableTime: true,
                        dateFormat: 'H:i',
                        position: this.$store.app.rtlClass === 'rtl' ? 'auto right' :
                            'auto left'
                    })
                },

                selectUpdateValue() {
                    noUiSlider1.set([this.nouiMin1, this.nouiMax1]);
                },

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
                }
            }));
        });
    </script>
    <style scoped>
        /* range picker */
        input[type=range] {
            -webkit-appearance: none;
        }

        input[type=range]::-webkit-slider-runnable-track {
            width: 100%;
            height: 8px;
            background: #dee2e6;
            border: none;
            border-radius: 3px;
        }

        input[type=range]::-webkit-slider-thumb {
            -webkit-appearance: none;
            border: none;
            height: 16px;
            width: 16px;
            border-radius: 50%;
            background: #4361ee;
            margin-top: -4px;
        }

        .dark input[type=range]::-webkit-slider-runnable-track {
            background: #1b2e4b;
        }

        .dark input[type=range] {
            background-color: transparent;
        }

        input[type=range]:focus {
            outline: none;
        }

        input[type=range]:active::-webkit-slider-thumb {
            background: #4361eec2;
            cursor: pointer;
        }
    </style>
</x-layout.default>
