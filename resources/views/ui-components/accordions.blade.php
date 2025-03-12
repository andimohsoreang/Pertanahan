<x-layout.default>


    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Components</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Accordians</span>
            </li>
        </ul>
        <div class="pt-5 space-y-8" x-data="form">
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
                <span class="ltr:mr-3 rtl:ml-3">Documentation: </span><a href="https://alpinejs.dev/component/accordion"
                    target="_blank" class="block hover:underline">https://alpinejs.dev/component/accordion</a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- basic -->
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
                    <div class="mb-5" x-data="{ active: 1 }">
                        <div class="space-y-2 font-semibold">
                            <div class="border border-[#d3d3d3] rounded dark:border-[#1b2e4b]">
                                <button type="button"
                                    class="p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]"
                                    :class="{ '!text-primary': active === 1 }"
                                    x-on:click="active === 1 ? active = null : active = 1">Collapsible Group Item #1
                                    <div class="ltr:ml-auto rtl:mr-auto" :class="{ 'rotate-180': active === 1 }">

                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-4 h-4">
                                            <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </button>
                                <div x-cloak x-show="active === 1" x-collapse>
                                    <div
                                        class="space-y-2 p-4 text-white-dark text-[13px] border-t border-[#d3d3d3] dark:border-[#1b2e4b]">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-[#d3d3d3] dark:border-[#1b2e4b] rounded">
                                <button type="button"
                                    class="p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]"
                                    :class="{ '!text-primary': active === 2 }"
                                    x-on:click="active === 2 ? active = null : active = 2">Collapsible Group Item #2
                                    <div class="ltr:ml-auto rtl:mr-auto" :class="{ 'rotate-180': active === 2 }">

                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-4 h-4">
                                            <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </button>
                                <div x-cloak x-show="active === 2" x-collapse>
                                    <div class="p-4 text-[13px] border-t border-[#d3d3d3] dark:border-[#1b2e4b]">
                                        <ul class="space-y-1">
                                            <li><a href="javascript:;">Apple</a></li>
                                            <li><a href="javascript:;">Orange</a></li>
                                            <li><a href="javascript:;">Banana</a></li>
                                            <li><a href="javascript:;">list</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-[#d3d3d3] dark:border-[#1b2e4b] rounded">
                                <button type="button"
                                    class="p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]"
                                    :class="{ '!text-primary': active === 3 }"
                                    x-on:click="active === 3 ? active = null : active = 3">Collapsible Group Item #3
                                    <div class="ltr:ml-auto rtl:mr-auto" :class="{ 'rotate-180': active === 3 }">

                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-4 h-4">
                                            <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </button>
                                <div x-cloak x-show="active === 3" x-collapse>
                                    <div class="p-4 text-[13px] border-t border-[#d3d3d3] dark:border-[#1b2e4b]">
                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                            tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                            wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                            vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                            synth nesciunt you probably haven't heard of them accusamus labore
                                            sustainable VHS.</p>
                                        <button type="button" class="btn btn-primary mt-4">Accept</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code1')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- basic --&gt;
    &lt;div class=&quot;mb-5&quot; x-data=&quot;{ active: 1 }&quot;&gt;
        &lt;div class=&quot;space-y-2 font-semibold&quot;&gt;
            &lt;div class=&quot;border border-[#d3d3d3] rounded dark:border-[#1b2e4b]&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]&quot; :class=&quot;{'!text-primary' : active === 1}&quot; x-on:click=&quot;active === 1 ? active = null : active = 1&quot;&gt;Collapsible Group Item #1
                    &lt;div class=&quot;ltr:ml-auto rtl:mr-auto&quot; :class=&quot;{'rotate-180' : active === 1}&quot;&gt;
                        &lt;svg&gt; ... &lt;/svg&gt;
                    &lt;/div&gt;
                &lt;/button&gt;
                &lt;div x-cloak x-show=&quot;active === 1&quot; x-collapse&gt;
                    &lt;div class=&quot;space-y-2 p-4 text-white-dark text-[13px] border-t border-[#d3d3d3] dark:border-[#1b2e4b]&quot;&gt;
                        &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&lt;/p&gt;
                        &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&lt;/p&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;

            &lt;div class=&quot;border border-[#d3d3d3] dark:border-[#1b2e4b] rounded&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]&quot; :class=&quot;{'!text-primary' : active === 2}&quot; x-on:click=&quot;active === 2 ? active = null : active = 2&quot;&gt;Collapsible Group Item #2
                    &lt;div class=&quot;ltr:ml-auto rtl:mr-auto&quot; :class=&quot;{'rotate-180' : active === 2}&quot;&gt;
                        &lt;svg&gt; ... &lt;/svg&gt;
                    &lt;/div&gt;
                &lt;/button&gt;
                &lt;div x-cloak x-show=&quot;active === 2&quot; x-collapse&gt;
                    &lt;div class=&quot;p-4 text-[13px] border-t border-[#d3d3d3] dark:border-[#1b2e4b]&quot;&gt;
                        &lt;ul class=&quot;space-y-1&quot;&gt;
                            &lt;li&gt;&lt;a href=&quot;javascript:;&quot;&gt;Apple&lt;/a&gt;&lt;/li&gt;
                            &lt;li&gt;&lt;a href=&quot;javascript:;&quot;&gt;Orange&lt;/a&gt;&lt;/li&gt;
                            &lt;li&gt;&lt;a href=&quot;javascript:;&quot;&gt;Banana&lt;/a&gt;&lt;/li&gt;
                            &lt;li&gt;&lt;a href=&quot;javascript:;&quot;&gt;list&lt;/a&gt;&lt;/li&gt;
                        &lt;/ul&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;

            &lt;div class=&quot;border border-[#d3d3d3] dark:border-[#1b2e4b] rounded&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]&quot; :class=&quot;{'!text-primary' : active === 3}&quot; x-on:click=&quot;active === 3 ? active = null : active = 3&quot;&gt;Collapsible Group Item #3
                    &lt;div class=&quot;ltr:ml-auto rtl:mr-auto&quot; :class=&quot;{'rotate-180' : active === 3}&quot;&gt;
                        &lt;svg&gt; ... &lt;/svg&gt;
                    &lt;/div&gt;
                &lt;/button&gt;
                &lt;div x-cloak x-show=&quot;active === 3&quot; x-collapse&gt;
                    &lt;div class=&quot;p-4 text-[13px] border-t border-[#d3d3d3] dark:border-[#1b2e4b]&quot;&gt;
                        &lt;p&gt;Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.&lt;/p&gt;
                        &lt;button type=&quot;button&quot; class=&quot;btn btn-primary mt-4&quot;&gt;Accept&lt;/button&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;collapse&quot;, () =&gt; ({
                collapse: false,

                collapseSidebar() {
                    this.collapse = !this.collapse;
                },
            }));

            Alpine.data(&quot;dropdown&quot;, (initialOpenState = false) =&gt; ({
                open: initialOpenState,

                toggle() {
                    this.open = !this.open;
                },
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- Without Spacing -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Without Spacing</h5>
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
                    <div class="mb-5" x-data="{ active: 1 }">
                        <div class="border border-[#d3d3d3] dark:border-[#3b3f5c] rounded font-semibold">
                            <div class="border-b border-[#d3d3d3] dark:border-[#3b3f5c]">
                                <button type="button"
                                    class="p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]"
                                    :class="{ '!text-primary': active === 1 }"
                                    x-on:click="active === 1 ? active = null : active = 1">Collapsible Group Item #1
                                    <div class="ltr:ml-auto rtl:mr-auto" :class="{ 'rotate-180': active === 1 }">

                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-4 h-4">
                                            <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </button>
                                <div x-cloak x-show="active === 1" x-collapse>
                                    <div class="space-y-2 p-4 text-white-dark text-[13px]">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="border-b border-[#d3d3d3] dark:border-[#3b3f5c]">
                                <button type="button"
                                    class="p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]"
                                    :class="{ '!text-primary': active === 2 }"
                                    x-on:click="active === 2 ? active = null : active = 2">Collapsible Group Item #2
                                    <div class="ltr:ml-auto rtl:mr-auto" :class="{ 'rotate-180': active === 2 }">

                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-4 h-4">
                                            <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </button>
                                <div x-cloak x-show="active === 2" x-collapse>
                                    <div class="p-4 text-[13px]">
                                        <ul class="space-y-1">
                                            <li><a href="javascript:;">Apple</a></li>
                                            <li><a href="javascript:;">Orange</a></li>
                                            <li><a href="javascript:;">Banana</a></li>
                                            <li><a href="javascript:;">list</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <button type="button"
                                    class="p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]"
                                    :class="{ '!text-primary': active === 3 }"
                                    x-on:click="active === 3 ? active = null : active = 3">Collapsible Group Item #3
                                    <div class="ltr:ml-auto rtl:mr-auto" :class="{ 'rotate-180': active === 3 }">

                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-4 h-4">
                                            <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </div>
                                </button>
                                <div x-cloak x-show="active === 3" x-collapse>
                                    <div class="p-4 text-[13px]">
                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                            tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                            wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                            vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                            synth nesciunt you probably haven't heard of them accusamus labore
                                            sustainable VHS.</p>
                                        <button type="button" class="btn btn-primary mt-4">Accept</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code2')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- without spacing --&gt;
    &lt;div class=&quot;mb-5&quot; x-data=&quot;{ active: 1 }&quot;&gt;
        &lt;div class=&quot;border border-[#d3d3d3] dark:border-[#3b3f5c] rounded font-semibold&quot;&gt;
            &lt;div class=&quot;border-b border-[#d3d3d3] dark:border-[#3b3f5c]&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]&quot; :class=&quot;{'!text-primary' : active === 1}&quot; x-on:click=&quot;active === 1 ? active = null : active = 1&quot;&gt;Collapsible Group Item #1
                    &lt;div class=&quot;ltr:ml-auto rtl:mr-auto&quot; :class=&quot;{'rotate-180' : active === 1}&quot;&gt;
                        &lt;svg&gt; ... &lt;/svg&gt;
                    &lt;/div&gt;
                &lt;/button&gt;
                &lt;div x-cloak x-show=&quot;active === 1&quot; x-collapse&gt;
                    &lt;div class=&quot;space-y-2 p-4 text-white-dark text-[13px]&quot;&gt;
                        &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&lt;/p&gt;
                        &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&lt;/p&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;

            &lt;div class=&quot;border-b border-[#d3d3d3] dark:border-[#3b3f5c]&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]&quot; :class=&quot;{'!text-primary' : active === 2}&quot; x-on:click=&quot;active === 2 ? active = null : active = 2&quot;&gt;Collapsible Group Item #2
                    &lt;div class=&quot;ltr:ml-auto rtl:mr-auto&quot; :class=&quot;{'rotate-180' : active === 2}&quot;&gt;
                        &lt;svg&gt; ... &lt;/svg&gt;
                    &lt;/div&gt;
                &lt;/button&gt;
                &lt;div x-cloak x-show=&quot;active === 2&quot; x-collapse&gt;
                    &lt;div class=&quot;p-4 text-[13px]&quot;&gt;
                        &lt;ul class=&quot;space-y-1&quot;&gt;
                            &lt;li&gt;&lt;a href=&quot;javascript:;&quot;&gt;Apple&lt;/a&gt;&lt;/li&gt;
                            &lt;li&gt;&lt;a href=&quot;javascript:;&quot;&gt;Orange&lt;/a&gt;&lt;/li&gt;
                            &lt;li&gt;&lt;a href=&quot;javascript:;&quot;&gt;Banana&lt;/a&gt;&lt;/li&gt;
                            &lt;li&gt;&lt;a href=&quot;javascript:;&quot;&gt;list&lt;/a&gt;&lt;/li&gt;
                        &lt;/ul&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;

            &lt;div&gt;
                &lt;button type=&quot;button&quot; class=&quot;p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]&quot; :class=&quot;{'!text-primary' : active === 3}&quot; x-on:click=&quot;active === 3 ? active = null : active = 3&quot;&gt;Collapsible Group Item #3
                    &lt;div class=&quot;ltr:ml-auto rtl:mr-auto&quot; :class=&quot;{'rotate-180' : active === 3}&quot;&gt;
                        &lt;svg&gt; ... &lt;/svg&gt;
                    &lt;/div&gt;
                &lt;/button&gt;
                &lt;div x-cloak x-show=&quot;active === 3&quot; x-collapse&gt;
                    &lt;div class=&quot;p-4 text-[13px]&quot;&gt;
                        &lt;p&gt;Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.&lt;/p&gt;
                        &lt;button type=&quot;button&quot; class=&quot;btn btn-primary mt-4&quot;&gt;Accept&lt;/button&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;collapse&quot;, () =&gt; ({
                collapse: false,

                collapseSidebar() {
                    this.collapse = !this.collapse;
                },
            }));

            Alpine.data(&quot;dropdown&quot;, (initialOpenState = false) =&gt; ({
                open: initialOpenState,

                toggle() {
                    this.open = !this.open;
                },
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- Icons -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Icons</h5>
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
                    <div class="mb-5" x-data="{ active: 1 }">
                        <div class="space-y-2 font-semibold">
                            <div class="border border-[#d3d3d3] dark:border-[#1b2e4b] rounded">
                                <button type="button"
                                    class="p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]"
                                    :class="{ '!text-primary': active === 1 }"
                                    x-on:click="active === 1 ? active = null : active = 1">

                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 ltr:mr-2 rtl:ml-2 text-primary shrink-0">
                                        <path opacity="0.5"
                                            d="M7.142 18.9706C5.18539 18.8995 3.99998 18.6568 3.17157 17.8284C2 16.6569 2 14.7712 2 11C2 7.22876 2 5.34315 3.17157 4.17157C4.34315 3 6.22876 3 10 3H14C17.7712 3 19.6569 3 20.8284 4.17157C22 5.34315 22 7.22876 22 11C22 14.7712 22 16.6569 20.8284 17.8284C20.0203 18.6366 18.8723 18.8873 17 18.965"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        <path
                                            d="M9.94955 16.0503C10.8806 15.1192 11.3461 14.6537 11.9209 14.6234C11.9735 14.6206 12.0261 14.6206 12.0787 14.6234C12.6535 14.6537 13.119 15.1192 14.0501 16.0503C16.0759 18.0761 17.0888 19.089 16.8053 19.963C16.7809 20.0381 16.7506 20.1112 16.7147 20.1815C16.2973 21 14.8648 21 11.9998 21C9.13482 21 7.70233 21 7.28489 20.1815C7.249 20.1112 7.21873 20.0381 7.19436 19.963C6.91078 19.089 7.92371 18.0761 9.94955 16.0503Z"
                                            stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                    Collapsible Group Item #1
                                    <div class="ltr:ml-auto rtl:mr-auto" :class="{ 'rotate-180': active === 1 }">

                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-4 h-4">
                                            <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </button>
                                <div x-cloak x-show="active === 1" x-collapse>
                                    <div
                                        class="space-y-2 p-4 text-white-dark text-[13px] border-t border-[#d3d3d3] dark:border-[#1b2e4b]">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="border border-[#d3d3d3] dark:border-[#1b2e4b] rounded">
                                <button type="button"
                                    class="p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]"
                                    :class="{ '!text-primary': active === 2 }"
                                    x-on:click="active === 2 ? active = null : active = 2">

                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 ltr:mr-2 rtl:ml-2 text-primary shrink-0">
                                        <path
                                            d="M15.5777 3.38197L17.5777 4.43152C19.7294 5.56066 20.8052 6.12523 21.4026 7.13974C22 8.15425 22 9.41667 22 11.9415V12.0585C22 14.5833 22 15.8458 21.4026 16.8603C20.8052 17.8748 19.7294 18.4393 17.5777 19.5685L15.5777 20.618C13.8221 21.5393 12.9443 22 12 22C11.0557 22 10.1779 21.5393 8.42229 20.618L6.42229 19.5685C4.27063 18.4393 3.19479 17.8748 2.5974 16.8603C2 15.8458 2 14.5833 2 12.0585V11.9415C2 9.41667 2 8.15425 2.5974 7.13974C3.19479 6.12523 4.27063 5.56066 6.42229 4.43152L8.42229 3.38197C10.1779 2.46066 11.0557 2 12 2C12.9443 2 13.8221 2.46066 15.5777 3.38197Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        <path opacity="0.5" d="M21 7.5L12 12M12 12L3 7.5M12 12V21.5"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                    Collapsible Group Item #2
                                    <div class="ltr:ml-auto rtl:mr-auto" :class="{ 'rotate-180': active === 2 }">

                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-4 h-4">
                                            <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </button>
                                <div x-cloak x-show="active === 2" x-collapse>
                                    <div class="p-4 text-[13px] border-t border-[#d3d3d3] dark:border-[#1b2e4b]">
                                        <ul class="space-y-1">
                                            <li><a href="javascript:;">Apple</a></li>
                                            <li><a href="javascript:;">Orange</a></li>
                                            <li><a href="javascript:;">Banana</a></li>
                                            <li><a href="javascript:;">list</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="border border-[#d3d3d3] dark:border-[#1b2e4b] rounded">
                                <button type="button"
                                    class="p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]"
                                    :class="{ '!text-primary': active === 3 }"
                                    x-on:click="active === 3 ? active = null : active = 3">

                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 ltr:mr-2 rtl:ml-2 text-primary shrink-0">
                                        <path
                                            d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                            stroke="currentColor" stroke-width="1.5" />
                                        <path opacity="0.5"
                                            d="M2 8.75C1.58579 8.75 1.25 9.08579 1.25 9.5C1.25 9.91421 1.58579 10.25 2 10.25V8.75ZM22 10.25C22.4142 10.25 22.75 9.91421 22.75 9.5C22.75 9.08579 22.4142 8.75 22 8.75V10.25ZM8.25 21C8.25 21.4142 8.58579 21.75 9 21.75C9.41421 21.75 9.75 21.4142 9.75 21H8.25ZM9.75 10C9.75 9.58579 9.41421 9.25 9 9.25C8.58579 9.25 8.25 9.58579 8.25 10L9.75 10ZM2 10.25H22V8.75H2V10.25ZM9.75 21L9.75 10L8.25 10L8.25 21H9.75Z"
                                            fill="currentColor" />
                                    </svg>
                                    Collapsible Group Item #3
                                    <div class="ltr:ml-auto rtl:mr-auto" :class="{ 'rotate-180': active === 3 }">

                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-4 h-4">
                                            <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </button>
                                <div x-cloak x-show="active === 3" x-collapse>
                                    <div class="p-4 text-[13px] border-t border-[#d3d3d3] dark:border-[#1b2e4b]">
                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                            tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                            wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                            vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                            synth nesciunt you probably haven't heard of them accusamus labore
                                            sustainable VHS.</p>
                                        <button type="button" class="btn btn-primary mt-4">Accept</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code3')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- icons --&gt;
    &lt;div class=&quot;mb-5&quot; x-data=&quot;{ active: 1 }&quot;&gt;
        &lt;div class=&quot;space-y-2 font-semibold&quot;&gt;
            &lt;div class=&quot;border border-[#d3d3d3] dark:border-[#1b2e4b] rounded&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]&quot; :class=&quot;{'!text-primary' : active === 1}&quot; x-on:click=&quot;active === 1 ? active = null : active = 1&quot;&gt;
                    &lt;svg&gt; ... &lt;/svg&gt; Collapsible Group Item #1
                    &lt;div class=&quot;ltr:ml-auto rtl:mr-auto&quot; :class=&quot;{'rotate-180' : active === 1}&quot;&gt;
                        &lt;svg&gt; ... &lt;/svg&gt;
                    &lt;/div&gt;
                &lt;/button&gt;
                &lt;div x-cloak x-show=&quot;active === 1&quot; x-collapse&gt;
                    &lt;div class=&quot;space-y-2 p-4 text-white-dark text-[13px] border-t border-[#d3d3d3] dark:border-[#1b2e4b]&quot;&gt;
                        &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&lt;/p&gt;
                        &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&lt;/p&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;

            &lt;div class=&quot;border border-[#d3d3d3] dark:border-[#1b2e4b] rounded&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]&quot; :class=&quot;{'!text-primary' : active === 2}&quot; x-on:click=&quot;active === 2 ? active = null : active = 2&quot;&gt;
                    &lt;svg&gt; ... &lt;/svg&gt; Collapsible Group Item #2
                    &lt;div class=&quot;ltr:ml-auto rtl:mr-auto&quot; :class=&quot;{'rotate-180' : active === 2}&quot;&gt;
                        &lt;svg&gt; ... &lt;/svg&gt;
                    &lt;/div&gt;
                &lt;/button&gt;
                &lt;div x-cloak x-show=&quot;active === 2&quot; x-collapse&gt;
                    &lt;div class=&quot;p-4 text-[13px] border-t border-[#d3d3d3] dark:border-[#1b2e4b]&quot;&gt;
                        &lt;ul class=&quot;space-y-1&quot;&gt;
                            &lt;li&gt;&lt;a href=&quot;javascript:;&quot;&gt;Apple&lt;/a&gt;&lt;/li&gt;
                            &lt;li&gt;&lt;a href=&quot;javascript:;&quot;&gt;Orange&lt;/a&gt;&lt;/li&gt;
                            &lt;li&gt;&lt;a href=&quot;javascript:;&quot;&gt;Banana&lt;/a&gt;&lt;/li&gt;
                            &lt;li&gt;&lt;a href=&quot;javascript:;&quot;&gt;list&lt;/a&gt;&lt;/li&gt;
                        &lt;/ul&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;

            &lt;div class=&quot;border border-[#d3d3d3] dark:border-[#1b2e4b] rounded&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]&quot; :class=&quot;{'!text-primary' : active === 3}&quot; x-on:click=&quot;active === 3 ? active = null : active = 3&quot;&gt;
                    &lt;svg&gt; ... &lt;/svg&gt; Collapsible Group Item #3
                    &lt;div class=&quot;ltr:ml-auto rtl:mr-auto&quot; :class=&quot;{'rotate-180' : active === 3}&quot;&gt;
                        &lt;svg&gt; ... &lt;/svg&gt;
                    &lt;/div&gt;
                &lt;/button&gt;
                &lt;div x-cloak x-show=&quot;active === 3&quot; x-collapse&gt;
                    &lt;div class=&quot;p-4 text-[13px] border-t border-[#d3d3d3] dark:border-[#1b2e4b]&quot;&gt;
                        &lt;p&gt;Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.&lt;/p&gt;
                        &lt;button type=&quot;button&quot; class=&quot;btn btn-primary mt-4&quot;&gt;Accept&lt;/button&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;collapse&quot;, () =&gt; ({
                collapse: false,

                collapseSidebar() {
                    this.collapse = !this.collapse;
                },
            }));

            Alpine.data(&quot;dropdown&quot;, (initialOpenState = false) =&gt; ({
                open: initialOpenState,

                toggle() {
                    this.open = !this.open;
                },
            }));
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <!-- no icons -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">No Icons</h5>
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
                    <div class="mb-5" x-data="{ active: 1 }">
                        <div class="space-y-2 font-semibold">
                            <div class="border border-[#d3d3d3] rounded dark:border-[#1b2e4b]">
                                <button type="button"
                                    class="p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]"
                                    :class="{ '!text-primary': active === 1 }"
                                    x-on:click="active === 1 ? active = null : active = 1">Collapsible Group Item #1
                                </button>
                                <div x-cloak x-show="active === 1" x-collapse>
                                    <div
                                        class="space-y-2 p-4 text-white-dark text-[13px] border-t border-[#d3d3d3] dark:border-[#1b2e4b]">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="border border-[#d3d3d3] dark:border-[#1b2e4b] rounded">
                                <button type="button"
                                    class="p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]"
                                    :class="{ '!text-primary': active === 2 }"
                                    x-on:click="active === 2 ? active = null : active = 2">Collapsible Group Item
                                    #2</button>
                                <div x-cloak x-show="active === 2" x-collapse>
                                    <div class="p-4 text-[13px] border-t border-[#d3d3d3] dark:border-[#1b2e4b]">
                                        <ul class="space-y-1">
                                            <li><a href="javascript:;">Apple</a></li>
                                            <li><a href="javascript:;">Orange</a></li>
                                            <li><a href="javascript:;">Banana</a></li>
                                            <li><a href="javascript:;">list</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="border border-[#d3d3d3] dark:border-[#1b2e4b] rounded">
                                <button type="button"
                                    class="p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]"
                                    :class="{ '!text-primary': active === 3 }"
                                    x-on:click="active === 3 ? active = null : active = 3">Collapsible Group Item #3
                                </button>
                                <div x-cloak x-show="active === 3" x-collapse>
                                    <div class="p-4 text-[13px] border-t border-[#d3d3d3] dark:border-[#1b2e4b]">
                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                            tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                            wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                            vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                            synth nesciunt you probably haven't heard of them accusamus labore
                                            sustainable VHS.</p>
                                        <button type="button" class="btn btn-primary mt-4">Accept</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code4')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- no icon --&gt;
    &lt;div class=&quot;mb-5&quot; x-data=&quot;{ active: 1 }&quot;&gt;
        &lt;div class=&quot;space-y-2 font-semibold&quot;&gt;
            &lt;div class=&quot;border border-[#d3d3d3] rounded dark:border-[#1b2e4b]&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]&quot; :class=&quot;{'!text-primary' : active === 1}&quot; x-on:click=&quot;active === 1 ? active = null : active = 1&quot;&gt;Collapsible Group Item #1
                &lt;/button&gt;
                &lt;div x-cloak x-show=&quot;active === 1&quot; x-collapse&gt;
                    &lt;div class=&quot;space-y-2 p-4 text-white-dark text-[13px] border-t border-[#d3d3d3] dark:border-[#1b2e4b]&quot;&gt;
                        &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&lt;/p&gt;
                        &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&lt;/p&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;

            &lt;div class=&quot;border border-[#d3d3d3] dark:border-[#1b2e4b] rounded&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]&quot; :class=&quot;{'!text-primary' : active === 2}&quot; x-on:click=&quot;active === 2 ? active = null : active = 2&quot;&gt;Collapsible Group Item #2&lt;/button&gt;
                &lt;div x-cloak x-show=&quot;active === 2&quot; x-collapse&gt;
                    &lt;div class=&quot;p-4 text-[13px] border-t border-[#d3d3d3] dark:border-[#1b2e4b]&quot;&gt;
                        &lt;ul class=&quot;space-y-1&quot;&gt;
                            &lt;li&gt;&lt;a href=&quot;javascript:;&quot;&gt;Apple&lt;/a&gt;&lt;/li&gt;
                            &lt;li&gt;&lt;a href=&quot;javascript:;&quot;&gt;Orange&lt;/a&gt;&lt;/li&gt;
                            &lt;li&gt;&lt;a href=&quot;javascript:;&quot;&gt;Banana&lt;/a&gt;&lt;/li&gt;
                            &lt;li&gt;&lt;a href=&quot;javascript:;&quot;&gt;list&lt;/a&gt;&lt;/li&gt;
                        &lt;/ul&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;

            &lt;div class=&quot;border border-[#d3d3d3] dark:border-[#1b2e4b] rounded&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;p-4 w-full flex items-center text-white-dark dark:bg-[#1b2e4b]&quot; :class=&quot;{'!text-primary' : active === 3}&quot; x-on:click=&quot;active === 3 ? active = null : active = 3&quot;&gt;Collapsible Group Item #3
                &lt;/button&gt;
                &lt;div x-cloak x-show=&quot;active === 3&quot; x-collapse&gt;
                    &lt;div class=&quot;p-4 text-[13px] border-t border-[#d3d3d3] dark:border-[#1b2e4b]&quot;&gt;
                        &lt;p&gt;Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.&lt;/p&gt;
                        &lt;button type=&quot;button&quot; class=&quot;btn btn-primary mt-4&quot;&gt;Accept&lt;/button&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;collapse&quot;, () =&gt; ({
                collapse: false,

                collapseSidebar() {
                    this.collapse = !this.collapse;
                },
            }));

            Alpine.data(&quot;dropdown&quot;, (initialOpenState = false) =&gt; ({
                open: initialOpenState,

                toggle() {
                    this.open = !this.open;
                },
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
            Alpine.data("form", () => ({

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

</x-layout.default>
