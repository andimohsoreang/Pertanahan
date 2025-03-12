<x-layout.default>

    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Forms</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>TouchSpin</span>
            </li>
        </ul>
        <div class="pt-5 grid grid-cols-1 lg:grid-cols-2 gap-6" x-data="touchspin">
            <!-- Basic -->
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Button Spin</h5>
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
                    <div class="relative">
                        <div class="flex">
                            <button type="button"
                                class="bg-primary text-white flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border border-r-0 border-primary"
                                @click="value1--;if(value1 < 0) value1 = 0;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                            <input type="number" placeholder="55" x-model="value1"
                                class="form-input rounded-none text-center" min="0" max="100" readonly
                                @wheel="changeValue($event, 'value1')" />
                            <button type="button"
                                class="bg-primary text-white flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border border-l-0 border-primary"
                                @click="value1++; if(value1 > 100) value1 = 100;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <template x-if="codeArr.includes('code1')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- basic --&gt;
    &lt;div class=&quot;flex&quot; x-data=&quot;touchspin&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;bg-primary text-white flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border border-r-0 border-primary&quot; @click=&quot;value1--;if(value1 &lt; 0) value1 = 0;&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
        &lt;input type=&quot;number&quot; placeholder=&quot;55&quot; x-model=&quot;value1&quot; class=&quot;form-input rounded-none text-center&quot; min=&quot;0&quot; max=&quot;100&quot; readonly readonly @wheel=&quot;changeValue($event, 'value1')&quot; /&gt;
        &lt;button type=&quot;button&quot; class=&quot;bg-primary text-white flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border border-l-0 border-primary&quot; @click=&quot;value1++; if(value1 &gt; 100) value1 = 100;&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;touchspin&quot;, () =&gt; ({
                value1: 0,

                changeValue(e, val) {
                    e.preventDefault();
                    if (e.deltaY &lt; 0) {
                        this.value1++;
                        this.value1 &gt; 100 ? this.value1 = 100 : this.value1;
                    } else {
                        this.value1--;
                        this.value1 &lt; 0 ? this.value1 = 0 : this.value1;
                    }
                }
            }));
        });
    &lt;/script&gt;
    </pre>
                </template>
            </div>

            <!-- step of 5 -->
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Spin button with step of 5</h5>
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
                <div class="mb-5">
                    <div class="relative">
                        <div class="flex">
                            <button type="button"
                                class="bg-primary text-white flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border border-r-0 border-primary"
                                @click="value2 -=5 ;if(value2 < 0) value2 = 0;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                            <input type="number" x-model="value2" placeholder="5" step="5" min="0"
                                max="50" readonly class="form-input rounded-none text-center"
                                @wheel="changeValue($event, 'value2')" />
                            <button type="button"
                                class="bg-primary text-white flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border border-l-0 border-primary"
                                @click="value2 += 5; if(value2 > 50) value2 = 50;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <template x-if="codeArr.includes('code2')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- step of 5 --&gt;
    &lt;div class=&quot;flex&quot; x-data=&quot;touchspin&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;bg-primary text-white flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border border-r-0 border-primary&quot; @click=&quot;value2 -=5 ;if(value2 &lt; 0) value2 = 0;&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
        &lt;input type=&quot;number&quot; x-model=&quot;value2&quot; placeholder=&quot;5&quot; step=&quot;5&quot; min=&quot;0&quot; max=&quot;50&quot; readonly class=&quot;form-input rounded-none text-center&quot; @wheel=&quot;changeValue($event, 'value2')&quot; /&gt;
        &lt;button type=&quot;button&quot; class=&quot;bg-primary text-white flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border border-l-0 border-primary&quot; @click=&quot;value2 += 5; if(value2 &gt; 50) value2 = 50;&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;touchspin&quot;, () =&gt; ({
                value2: 0,

                changeValue(e, val) {
                    e.preventDefault();
                    if (e.deltaY &lt; 0) {
                        this.value2 += 5;
                        this.value2 &gt; 50 ? this.value2 = 50 : this.value2;
                    } else {
                        this.value2 -= 5;
                        this.value2 &lt; 0 ? this.value2 = 0 : this.value2;
                    }
                }
            }));
        });
    &lt;/script&gt;
    </pre>
                </template>
            </div>

            <!-- Wrapping value -->
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Wrapping value spin button</h5>
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
                <div class="mb-5">
                    <div class="relative">
                        <div class="flex">
                            <button type="button"
                                class="bg-primary text-white flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border border-r-0 border-primary"
                                @click="value3 -=1 ;if(value3 < 0) value3 = 20;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                            <input type="number" x-model="value3" placeholder="_ _"
                                class="form-input rounded-none text-center" min="0" max="20" readonly
                                @wheel="changeValue($event, 'value3')" />
                            <button type="button"
                                class="bg-primary text-white flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border border-l-0 border-primary"
                                @click="value3 += 1; if(value3 > 20) value3 = 0;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <template x-if="codeArr.includes('code3')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- wrapping value --&gt;
    &lt;div class=&quot;flex&quot; x-data=&quot;touchspin&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;bg-primary text-white flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border border-r-0 border-primary&quot; @click=&quot;value3 -=1 ;if(value3 &lt; 0) value3 = 20;&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
        &lt;input type=&quot;number&quot; x-model=&quot;value3&quot; placeholder=&quot;_ _&quot; class=&quot;form-input rounded-none text-center&quot; min=&quot;0&quot; max=&quot;20&quot; readonly @wheel=&quot;changeValue($event, 'value3')&quot; /&gt;
        &lt;button type=&quot;button&quot; class=&quot;bg-primary text-white flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border border-l-0 border-primary&quot; @click=&quot;value3 += 1; if(value3 &gt; 20) value3 = 0;&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;touchspin&quot;, () =&gt; ({
                value3: 0,

                changeValue(e, val) {
                    e.preventDefault();
                    if (e.deltaY &lt; 0) {
                        this.value3 += 1;
                        this.value3 &gt; 20 ? this.value3 = 0 : this.value3;
                    } else {
                        this.value3 -= 1;
                        this.value3 &lt; 0 ? this.value3 = 20 : this.value3;
                    }
                }
            }));
        });
    &lt;/script&gt;
    </pre>
                </template>
            </div>

            <!-- Size -->
            <div class="panel lg:row-span-2">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Size</h5>
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
                <!-- large -->
                <div class="mb-5">
                    <div class="mb-5">
                        <label for="sizeLarge">Large size</label>
                        <div class="flex">
                            <button type="button"
                                class="bg-primary text-white flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border border-r-0 border-primary"
                                @click="value4--;if(value4 < 0) value4 = 0;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                            <input id="sizeLarge" type="number" x-model="value4" placeholder="55"
                                class="form-input form-input-lg rounded-none text-center" min="0"
                                max="25" readonly @wheel="changeValue($event, 'value4')" />
                            <button type="button"
                                class="bg-primary text-white flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border border-l-0 border-primary"
                                @click="value4++; if(value4 > 25) value4 = 25;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- default -->
                    <div class="mb-5">
                        <label for="sizeDefault">Default size</label>
                        <div class="flex">
                            <button type="button"
                                class="bg-primary text-white flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border border-r-0 border-primary"
                                @click="value5--;if(value5 < 0) value5 = 0;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                            <input type="number" x-model="value5" placeholder="55"
                                class="form-input rounded-none text-center" min="0" max="25" readonly
                                @wheel="changeValue($event, 'value5')" />
                            <button type="button"
                                class="bg-primary text-white flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border border-l-0 border-primary"
                                @click="value5++; if(value5 > 25) value5 = 25;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- small -->
                    <div>
                        <label for="sizeSmall">Small size</label>
                        <div class="flex">
                            <button type="button"
                                class="bg-primary text-white flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border border-r-0 border-primary"
                                @click="value6--;if(value6 < 0) value6 = 0;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                            <input id="sizeSmall" type="number" x-model="value6" placeholder="55"
                                class="form-input form-input-sm rounded-none text-center" min="0"
                                max="25" readonly @wheel="changeValue($event, 'value6')" />
                            <button type="button"
                                class="bg-primary text-white flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border border-l-0 border-primary"
                                @click="value6++; if(value6 > 25) value6 = 25;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <template x-if="codeArr.includes('code4')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- large --&gt;
    &lt;div class=&quot;flex&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;bg-primary text-white flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border border-r-0 border-primary&quot; @click=&quot;value4--;if(value4 &lt; 0) value4 = 0;&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
        &lt;input type=&quot;number&quot; x-model=&quot;value4&quot; placeholder=&quot;55&quot; class=&quot;form-input form-input-lg rounded-none text-center&quot; min=&quot;0&quot; max=&quot;25&quot; readonly @wheel=&quot;changeValue($event, 'value4')&quot; /&gt;
        &lt;button type=&quot;button&quot; class=&quot;bg-primary text-white flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border border-l-0 border-primary&quot; @click=&quot;value4++; if(value4 &gt; 25) value4 = 25;&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- default --&gt;
    &lt;div class=&quot;flex&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;bg-primary text-white flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border border-r-0 border-primary&quot; @click=&quot;value5--;if(value5 &lt; 0) value5 = 0;&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
        &lt;input type=&quot;number&quot; x-model=&quot;value5&quot; placeholder=&quot;55&quot; class=&quot;form-input rounded-none text-center&quot; min=&quot;0&quot; max=&quot;25&quot; readonly @wheel=&quot;changeValue($event, 'value5')&quot; /&gt;
        &lt;button type=&quot;button&quot; class=&quot;bg-primary text-white flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border border-l-0 border-primary&quot; @click=&quot;value5++; if(value5 &gt; 25) value5 = 25;&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- small --&gt;
    &lt;div class=&quot;flex&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;bg-primary text-white flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border border-r-0 border-primary&quot; @click=&quot;value6--;if(value6 &lt; 0) value6 = 0;&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
        &lt;input type=&quot;number&quot; x-model=&quot;value6&quot; placeholder=&quot;55&quot; class=&quot;form-input form-input-sm rounded-none text-center&quot; min=&quot;0&quot; max=&quot;25&quot; readonly @wheel=&quot;changeValue($event, 'value6')&quot; /&gt;
        &lt;button type=&quot;button&quot; class=&quot;bg-primary text-white flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border border-l-0 border-primary&quot; @click=&quot;value6++; if(value6 &gt; 25) value6 = 25;&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;touchspin&quot;, () =&gt; ({
                value4: 0,
                value5: 0,
                value6: 0,

                changeValue(e, val) {
                    e.preventDefault();
                    if (e.deltaY &lt; 0) {
                        if (val === 'value4') {
                            this.value4++;
                            this.value4 &gt; 25 ? this.value4 = 25 : this.value4;
                        } else if (val === 'value5') {
                            this.value5++;
                            this.value5 &gt; 25 ? this.value5 = 25 : this.value5;
                        } else if (val === 'value6') {
                            this.value6++;
                            this.value6 &gt; 25 ? this.value6 = 25 : this.value6;
                        }
                    } else {
                        if (val === 'value4') {
                            this.value4--;
                            this.value4 &lt; 0 ? this.value4 = 0 : this.value4;
                        } else if (val === 'value5') {
                            this.value5--;
                            this.value5 &lt; 0 ? this.value5 = 0 : this.value5;
                        } else if (val === 'value6') {
                            this.value6--;
                            this.value6 &lt; 0 ? this.value6 = 0 : this.value6;
                        }
                    }
                }
            }));
        });
    &lt;/script&gt;
    </pre>
                </template>
            </div>
            <!-- Inline Buttons -->
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Inline spin button</h5>
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
                    <div class="mb-5">
                        <div class="inline-flex">
                            <button type="button"
                                class="bg-primary text-white flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border border-r-0 border-primary"
                                @click="value7--;if(value7 < 0) value7 = 0;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                            <input type="number" x-model="value7" placeholder="55"
                                class="form-input rounded-none text-center" min="0" max="25" readonly
                                @wheel="changeValue($event, 'value7')" />
                            <button type="button"
                                class="bg-primary text-white flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border border-l-0 border-primary"
                                @click="value7++; if(value7 > 25) value7 = 25;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <template x-if="codeArr.includes('code5')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- inline buttons --&gt;
    &lt;div class=&quot;inline-flex&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;bg-primary text-white flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border border-r-0 border-primary&quot; @click=&quot;value7--;if(value7 &lt; 0) value7 = 0;&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
        &lt;input type=&quot;number&quot; x-model=&quot;value7&quot; placeholder=&quot;55&quot; class=&quot;form-input rounded-none text-center&quot; min=&quot;0&quot; max=&quot;25&quot; readonly @wheel=&quot;changeValue($event, 'value7')&quot; /&gt;
        &lt;button type=&quot;button&quot; class=&quot;bg-primary text-white flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border border-l-0 border-primary&quot; @click=&quot;value7++; if(value7 &gt; 25) value7 = 25;&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;touchspin&quot;, () =&gt; ({
                value7: 0,

                changeValue(e, val) {
                    e.preventDefault();
                    if (e.deltaY &lt; 0) {
                        this.value7++;
                        this.value7 &gt; 25 ? this.value7 = 25 : this.value7;
                    } else {
                        this.value7--;
                        this.value7 &lt; 0 ? this.value7 = 0 : this.value7;
                    }
                }
            }));
        });
    &lt;/script&gt;
    </pre>
                </template>
            </div>

            <!-- Vertical Buttons -->
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Vertical spin button</h5>
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
                    <div class="mb-5">
                        <div class="inline-flex flex-col w-[50px]">
                            <button type="button"
                                class="bg-primary text-white flex justify-center items-center rounded-t-md p-3 font-semibold border border-b-0 border-primary"
                                @click="value8--;if(value8 < 0) value8 = 0;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                            <input type="number" x-model="value8" placeholder="55"
                                class="form-input rounded-none text-center px-2" min="0" max="25"
                                readonly @wheel="changeValue($event, 'value8')" />
                            <button type="button"
                                class="bg-primary text-white flex justify-center items-center rounded-b-md p-3 font-semibold border border-t-0 border-primary"
                                @click="value8++; if(value8 > 25) value8 = 25;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <template x-if="codeArr.includes('code6')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- vertical buttons --&gt;
    &lt;div class=&quot;inline-flex flex-col w-[50px]&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;bg-primary text-white flex justify-center items-center rounded-t-md p-3 font-semibold border border-b-0 border-primary&quot; @click=&quot;value8--;if(value8 &lt; 0) value8 = 0;&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
        &lt;input type=&quot;number&quot; x-model=&quot;value8&quot; placeholder=&quot;55&quot; class=&quot;form-input rounded-none text-center px-2&quot; min=&quot;0&quot; max=&quot;25&quot; readonly @wheel=&quot;changeValue($event, 'value8')&quot; /&gt;
        &lt;button type=&quot;button&quot; class=&quot;bg-primary text-white flex justify-center items-center rounded-b-md p-3 font-semibold border border-t-0 border-primary&quot; @click=&quot;value8++; if(value8 &gt; 25) value8 = 25;&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;touchspin&quot;, () =&gt; ({
                value8: 0,

                changeValue(e, val) {
                    e.preventDefault();
                    if (e.deltaY &lt; 0) {
                            this.value8++;
                            this.value8 &gt; 25 ? this.value8 = 25 : this.value8;
                    } else {
                        this.value8--;
                        this.value8 &lt; 0 ? this.value8 = 0 : this.value8;
                    }
                }
            }));
        });
    &lt;/script&gt;
    </pre>
                </template>
            </div>

            <div class="space-y-8">
                <!-- text with spin  -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Text with spin button</h5>
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
                        <div class="relative">
                            <div class="flex">
                                <button type="button"
                                    class="bg-primary text-white flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border border-r-0 border-primary"
                                    @click="value9--;if(value9 < 0) value9 = 6;">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </button>
                                <input type="text" x-model="dayFormatter(value9)" placeholder="Sunday"
                                    class="form-input rounded-none text-center" min="0" max="6"
                                    readonly @wheel="changeValue($event, 'value9')" />
                                <button type="button"
                                    class="bg-primary text-white flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border border-l-0 border-primary"
                                    @click="value9++; if(value9 > 6) value9 = 0;">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code7')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- text with spin button --&gt;
    &lt;div class=&quot;flex&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;bg-primary text-white flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border border-r-0 border-primary&quot; @click=&quot;value9--;if(value9 &lt; 0) value9 = 6;&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
        &lt;input type=&quot;text&quot; x-model=&quot;dayFormatter(value9)&quot; placeholder=&quot;Sunday&quot; class=&quot;form-input rounded-none text-center&quot; min=&quot;0&quot; max=&quot;6&quot; readonly @wheel=&quot;changeValue($event, 'value9')&quot; /&gt;
        &lt;button type=&quot;button&quot; class=&quot;bg-primary text-white flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border border-l-0 border-primary&quot; @click=&quot;value9++; if(value9 &gt; 6) value9 = 0;&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;touchspin&quot;, () =&gt; ({
                value9: 0,
                days: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],

                dayFormatter(value) {
                    return this.days[value];
                },

                changeValue(e, val) {
                    e.preventDefault();
                    if (e.deltaY &lt; 0) {
                        this.value9++;
                        this.value9 &gt; 6 ? this.value9 = 0 : this.value9;
                    } else {
                        this.value9--;
                        this.value9 &lt; 0 ? this.value9 = 6 : this.value9;
                    }
                }
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>
                <!-- Change Button Class -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Change button class</h5>
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
                        <div class="relative">
                            <div class="flex">
                                <button type="button"
                                    class="bg-danger text-white flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border border-r-0 border-danger"
                                    @click="value10--;if(value10 < 0) value10 = 0;">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </button>
                                <input type="number" x-model="value10" placeholder="55"
                                    class="form-input rounded-none text-center" min="0" max="25"
                                    readonly @wheel="changeValue($event, 'value10')" />
                                <button type="button"
                                    class="bg-warning text-white flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border border-l-0 border-warning"
                                    @click="value10++; if(value10 > 25) value10 = 25;">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code8')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- basic --&gt;
    &lt;div class=&quot;flex&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;bg-danger text-white flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border border-r-0 border-danger&quot; @click=&quot;value10--;if(value10 &lt; 0) value10 = 0;&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
        &lt;input type=&quot;number&quot; x-model=&quot;value10&quot; placeholder=&quot;55&quot; class=&quot;form-input rounded-none text-center&quot; min=&quot;0&quot; max=&quot;25&quot; readonly @wheel=&quot;changeValue($event, 'value10')&quot; /&gt;
        &lt;button type=&quot;button&quot; class=&quot;bg-warning text-white flex justify-center items-center ltr:rounded-r-md rtl:rounded-l-md px-3 font-semibold border border-l-0 border-warning&quot; @click=&quot;value10++; if(value10 &gt; 25) value10 = 25;&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;touchspin&quot;, () =&gt; ({
                value10: 0,

                changeValue(e, val) {
                    e.preventDefault();
                    if (e.deltaY &lt; 0) {
                        this.value10++;
                        this.value10 &gt; 25 ? this.value10 = 25 : this.value10;
                    } else {
                        this.value10--;
                        this.value10 &lt; 0 ? this.value10 = 0 : this.value10;
                    }
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
        document.addEventListener("alpine:init", () => {
            Alpine.data("touchspin", () => ({
                value1: 0,
                value2: 0,
                value3: 0,
                value4: 0,
                value5: 0,
                value6: 0,
                value7: 0,
                value8: 0,
                value9: 0,
                value10: 0,
                days: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],

                dayFormatter(value) {
                    return this.days[value];
                },

                changeValue(e, val) {
                    e.preventDefault();
                    if (e.deltaY < 0) {
                        if (val === 'value1') {
                            this.value1++;
                            this.value1 > 100 ? this.value1 = 100 : this.value1;
                        } else if (val === 'value2') {
                            this.value2 += 5;
                            this.value2 > 50 ? this.value2 = 50 : this.value2;
                        } else if (val === 'value3') {
                            this.value3 += 1;
                            this.value3 > 20 ? this.value3 = 0 : this.value3;
                        } else if (val === 'value4') {
                            this.value4++;
                            this.value4 > 25 ? this.value4 = 25 : this.value4;
                        } else if (val === 'value5') {
                            this.value5++;
                            this.value5 > 25 ? this.value5 = 25 : this.value5;
                        } else if (val === 'value6') {
                            this.value6++;
                            this.value6 > 25 ? this.value6 = 25 : this.value6;
                        } else if (val === 'value7') {
                            this.value7++;
                            this.value7 > 25 ? this.value7 = 25 : this.value7;
                        } else if (val === 'value8') {
                            this.value8++;
                            this.value8 > 25 ? this.value8 = 25 : this.value8;
                        } else if (val === 'value9') {
                            this.value9++;
                            this.value9 > 6 ? this.value9 = 0 : this.value9;
                        } else if (val === 'value10') {
                            this.value10++;
                            this.value10 > 25 ? this.value10 = 25 : this.value10;
                        }
                    } else {
                        if (val === 'value1') {
                            this.value1--;
                            this.value1 < 0 ? this.value1 = 0 : this.value1;
                        } else if (val === 'value2') {
                            this.value2 -= 5;
                            this.value2 < 0 ? this.value2 = 0 : this.value2;
                        } else if (val === 'value3') {
                            this.value3 -= 1;
                            this.value3 < 0 ? this.value3 = 20 : this.value3;
                        } else if (val === 'value4') {
                            this.value4--;
                            this.value4 < 0 ? this.value4 = 0 : this.value4;
                        } else if (val === 'value5') {
                            this.value5--;
                            this.value5 < 0 ? this.value5 = 0 : this.value5;
                        } else if (val === 'value6') {
                            this.value6--;
                            this.value6 < 0 ? this.value6 = 0 : this.value6;
                        } else if (val === 'value7') {
                            this.value7--;
                            this.value7 < 0 ? this.value7 = 0 : this.value7;
                        } else if (val === 'value8') {
                            this.value8--;
                            this.value8 < 0 ? this.value8 = 0 : this.value8;
                        } else if (val === 'value9') {
                            this.value9--;
                            this.value9 < 0 ? this.value9 = 6 : this.value9;
                        } else if (val === 'value10') {
                            this.value10--;
                            this.value10 < 0 ? this.value10 = 0 : this.value10;
                        }
                    }
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
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0;
        }
    </style>
</x-layout.default>
