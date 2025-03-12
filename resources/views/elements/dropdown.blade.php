<x-layout.default>


    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Elements</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Dropdowns</span>
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
                <span class="ltr:mr-3 rtl:ml-3">Documentation: </span><a href="https://alpinejs.dev/component/dropdown"
                    target="_blank" class="block hover:underline">https://alpinejs.dev/component/dropdown</a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Basic</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code1')"><span class="flex items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                    <path
                                        d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round"></path>
                                    <path
                                        d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                                Code </span> </a>
                    </div>
                    <div class="mb-5">
                        <div class="flex flex-wrap w-full justify-around gap-7">
                            <div class="flex items-center justify-center">
                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" @click="toggle">Action
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 ltr:ml-1 rtl:mr-1 inline-block">
                                            <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                        class="ltr:right-0 rtl:left-0 whitespace-nowrap">
                                        <li><a href="javascript:;" @click="toggle">Action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Another action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Something else here</a></li>
                                        <li><a href="javascript:;" @click="toggle">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                    <button class="btn btn-outline-primary dropdown-toggle" @click="toggle">Action
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 ltr:ml-1 rtl:mr-1 inline-block">
                                            <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                        class="ltr:right-0 rtl:left-0 whitespace-nowrap">
                                        <li><a href="javascript:;" @click="toggle">Action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Another action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Something else here</a></li>
                                        <li><a href="javascript:;" @click="toggle">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code1')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- default --&gt;
    &lt;div x-data=&quot;dropdown&quot; @click.outside=&quot;open = false&quot; class=&quot;dropdown&quot;&gt;
        &lt;button class=&quot;btn btn-primary dropdown-toggle&quot; @click=&quot;toggle&quot;&gt;Action
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
        &lt;ul x-cloak x-show=&quot;open&quot; x-transition x-transition.duration.300ms class=&quot;ltr:right-0 rtl:left-0 whitespace-nowrap&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Separated link&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/div&gt;

    &lt;!-- outline --&gt;
    &lt;div x-data=&quot;dropdown&quot; @click.outside=&quot;open = false&quot; class=&quot;dropdown&quot;&gt;
        &lt;button class=&quot;btn btn-outline-primary dropdown-toggle&quot; @click=&quot;toggle&quot;&gt;Action
            &lt;svg&gt; ... &lt;/svg&gt;&lt;/button&gt;
        &lt;ul x-cloak x-show=&quot;open&quot; x-transition x-transition.duration.300ms class=&quot;ltr:right-0 rtl:left-0 whitespace-nowrap&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Separated link&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
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

                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Dropup</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code2')"><span class="flex items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                    <path
                                        d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round"></path>
                                    <path
                                        d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                                Code </span> </a>
                    </div>
                    <div class="mb-5">
                        <div class="flex flex-wrap w-full justify-around gap-7">
                            <div class="flex items-center justify-center">
                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                    <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                        class="ltr:right-0 rtl:left-0 bottom-full !mt-0 mb-1 whitespace-nowrap">
                                        <li><a href="javascript:;" @click="toggle">Action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Another action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Something else here</a></li>
                                        <li><a href="javascript:;" @click="toggle">Separated link</a></li>
                                    </ul>
                                    <button class="btn btn-info dropdown-toggle inline-flex" @click="toggle">Up
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 ltr:ml-1 rtl:mr-1 inline-block rotate-180">
                                            <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                    <button class="btn btn-outline-info dropdown-toggle inline-flex"
                                        @click="toggle">Up
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 ltr:ml-1 rtl:mr-1 inline-block rotate-180">
                                            <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                        class="ltr:right-0 rtl:left-0 bottom-full !mt-0 mb-1 whitespace-nowrap">
                                        <li><a href="javascript:;" @click="toggle">Action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Another action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Something else here</a></li>
                                        <li><a href="javascript:;" @click="toggle">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code2')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- default --&gt;
    &lt;div x-data=&quot;dropdown&quot; @click.outside=&quot;open = false&quot; class=&quot;dropdown&quot;&gt;
        &lt;ul x-cloak x-show=&quot;open&quot; x-transition x-transition.duration.300ms class=&quot;ltr:right-0 rtl:left-0 bottom-full !mt-0 mb-1 whitespace-nowrap&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Separated link&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
        &lt;button class=&quot;btn btn-info dropdown-toggle inline-flex&quot; @click=&quot;toggle&quot;&gt;Up
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- outline --&gt;
    &lt;div x-data=&quot;dropdown&quot; @click.outside=&quot;open = false&quot; class=&quot;dropdown&quot;&gt;
        &lt;button class=&quot;btn btn-outline-info dropdown-toggle inline-flex&quot; @click=&quot;toggle&quot;&gt;Up
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
        &lt;ul x-cloak x-show=&quot;open&quot; x-transition x-transition.duration.300ms class=&quot;ltr:right-0 rtl:left-0 bottom-full !mt-0 mb-1 whitespace-nowrap&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Separated link&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
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

                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Dropright</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code3')"><span class="flex items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                    <path
                                        d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round"></path>
                                    <path
                                        d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                                Code </span> </a>
                    </div>
                    <div class="mb-5">
                        <div class="flex flex-wrap w-full justify-around gap-7">
                            <div class="flex items-center justify-center">
                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                    <button class="btn btn-warning dropdown-toggle" @click="toggle">Right
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 ltr:ml-1 rtl:mr-1 rtl:rotate-180 inline-block">
                                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                        class="ltr:left-full rtl:right-full top-0 !mt-0 ltr:ml-1 rtl:mr-1 whitespace-nowrap">
                                        <li><a href="javascript:;" @click="toggle">Action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Another action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Something else here</a></li>
                                        <li><a href="javascript:;" @click="toggle">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                    <button class="btn btn-outline-warning dropdown-toggle" @click="toggle">Right
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 ltr:ml-1 rtl:mr-1 rtl:rotate-180 inline-block">
                                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                        class="ltr:left-full rtl:right-full top-0 !mt-0 ltr:ml-1 rtl:mr-1 whitespace-nowrap">
                                        <li><a href="javascript:;" @click="toggle">Action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Another action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Something else here</a></li>
                                        <li><a href="javascript:;" @click="toggle">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code3')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- default --&gt;
    &lt;div x-data=&quot;dropdown&quot; @click.outside=&quot;open = false&quot; class=&quot;dropdown&quot;&gt;
        &lt;button class=&quot;btn btn-warning dropdown-toggle&quot; @click=&quot;toggle&quot;&gt;Right
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
        &lt;ul x-cloak x-show=&quot;open&quot; x-transition x-transition.duration.300ms class=&quot;ltr:left-full rtl:right-full top-0 !mt-0 ltr:ml-1 rtl:mr-1 whitespace-nowrap&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Separated link&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/div&gt;

    &lt;!-- outline --&gt;
    &lt;div x-data=&quot;dropdown&quot; @click.outside=&quot;open = false&quot; class=&quot;dropdown&quot;&gt;
        &lt;button class=&quot;btn btn-outline-warning dropdown-toggle&quot; @click=&quot;toggle&quot;&gt;Right
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
        &lt;ul x-cloak x-show=&quot;open&quot; x-transition x-transition.duration.300ms class=&quot;ltr:left-full rtl:right-full top-0 !mt-0 ltr:ml-1 rtl:mr-1 whitespace-nowrap&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Separated link&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
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

                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Dropleft</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code4')"><span class="flex items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                    <path
                                        d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round"></path>
                                    <path
                                        d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                                Code </span> </a>
                    </div>
                    <div class="mb-5">
                        <div class="flex flex-wrap w-full justify-around gap-7">
                            <div class="flex items-center justify-center">
                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                    <button class="btn btn-danger dropdown-toggle" @click="toggle">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 ltr:mr-1 rtl:ml-1 ltr:rotate-180 inline-block">
                                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Left</button>
                                    <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                        class="ltr:right-full rtl:left-full top-0 !mt-0 ltr:mr-1 rtl:ml-1 whitespace-nowrap">
                                        <li><a href="javascript:;" @click="toggle">Action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Another action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Something else here</a></li>
                                        <li><a href="javascript:;" @click="toggle">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                    <button class="btn btn-outline-danger dropdown-toggle" @click="toggle">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 ltr:mr-1 rtl:ml-1 ltr:rotate-180 inline-block">
                                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Left</button>
                                    <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                        class="ltr:right-full rtl:left-full top-0 !mt-0 ltr:mr-1 rtl:ml-1 whitespace-nowrap">
                                        <li><a href="javascript:;" @click="toggle">Action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Another action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Something else here</a></li>
                                        <li><a href="javascript:;" @click="toggle">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code4')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- default --&gt;
    &lt;div x-data=&quot;dropdown&quot; @click.outside=&quot;open = false&quot; class=&quot;dropdown&quot;&gt;
        &lt;button class=&quot;btn btn-danger dropdown-toggle&quot; @click=&quot;toggle&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
            Left
        &lt;/button&gt;
        &lt;ul x-cloak x-show=&quot;open&quot; x-transition x-transition.duration.300ms class=&quot;ltr:right-full rtl:left-full top-0 !mt-0 ltr:mr-1 rtl:ml-1 whitespace-nowrap&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Separated link&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/div&gt;

    &lt;!-- outline --&gt;
    &lt;div x-data=&quot;dropdown&quot; @click.outside=&quot;open = false&quot; class=&quot;dropdown&quot;&gt;
        &lt;button class=&quot;btn btn-outline-danger dropdown-toggle&quot; @click=&quot;toggle&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
            Left
        &lt;/button&gt;
        &lt;ul x-cloak x-show=&quot;open&quot; x-transition x-transition.duration.300ms class=&quot;ltr:right-full rtl:left-full top-0 !mt-0 ltr:mr-1 rtl:ml-1 whitespace-nowrap&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Separated link&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
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

                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Small Button</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code5')"><span class="flex items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                    <path
                                        d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round"></path>
                                    <path
                                        d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                                Code </span> </a>
                    </div>
                    <div class="mb-5">
                        <div class="flex flex-wrap w-full justify-around gap-7">
                            <div class="flex items-center justify-center">
                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                    <button class="btn btn-dark btn-sm dropdown-toggle" @click="toggle">Small Button
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 ltr:ml-1 rtl:mr-1 inline-block">
                                            <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                        class="ltr:right-0 rtl:left-0 whitespace-nowrap">
                                        <li><a href="javascript:;" @click="toggle">Action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Another action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Something else here</a></li>
                                        <li><a href="javascript:;" @click="toggle">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                    <button class="btn btn-outline-dark btn-sm dropdown-toggle" @click="toggle">Small
                                        Button
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 ltr:ml-1 rtl:mr-1 inline-block">
                                            <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                        class="ltr:right-0 rtl:left-0 whitespace-nowrap">
                                        <li><a href="javascript:;" @click="toggle">Action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Another action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Something else here</a></li>
                                        <li><a href="javascript:;" @click="toggle">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code5')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- default --&gt;
    &lt;div x-data=&quot;dropdown&quot; @click.outside=&quot;open = false&quot; class=&quot;dropdown&quot;&gt;
        &lt;button class=&quot;btn btn-dark btn-sm dropdown-toggle&quot; @click=&quot;toggle&quot;&gt;Small Button
            &lt;svg&gt; ... &lt;/svg&gt;&lt;/button&gt;
        &lt;ul x-cloak x-show=&quot;open&quot; x-transition x-transition.duration.300ms class=&quot;ltr:right-0 rtl:left-0 whitespace-nowrap&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Separated link&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/div&gt;

    &lt;!-- outline --&gt;
    &lt;div x-data=&quot;dropdown&quot; @click.outside=&quot;open = false&quot; class=&quot;dropdown&quot;&gt;
        &lt;button class=&quot;btn btn-outline-dark btn-sm dropdown-toggle&quot; @click=&quot;toggle&quot;&gt;Small Button
            &lt;svg&gt; ... &lt;/svg&gt;&lt;/button&gt;
        &lt;ul x-cloak x-show=&quot;open&quot; x-transition x-transition.duration.300ms class=&quot;ltr:right-0 rtl:left-0 whitespace-nowrap&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Separated link&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
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

                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Large Button</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code6')"><span class="flex items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                    <path
                                        d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round"></path>
                                    <path
                                        d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                                Code </span> </a>
                    </div>
                    <div class="mb-5">
                        <div class="flex flex-wrap w-full justify-around gap-7">
                            <div class="flex items-center justify-center">
                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                    <button class="btn btn-success btn-lg dropdown-toggle" @click="toggle">Large
                                        Button
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 ltr:ml-1 rtl:mr-1 inline-block">
                                            <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                        class="ltr:right-0 rtl:left-0 whitespace-nowrap">
                                        <li><a href="javascript:;" @click="toggle">Action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Another action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Something else here</a></li>
                                        <li><a href="javascript:;" @click="toggle">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                    <button class="btn btn-outline-success btn-lg dropdown-toggle"
                                        @click="toggle">Large Button
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 ltr:ml-1 rtl:mr-1 inline-block">
                                            <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                        class="ltr:right-0 rtl:left-0 whitespace-nowrap">
                                        <li><a href="javascript:;" @click="toggle">Action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Another action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Something else here</a></li>
                                        <li><a href="javascript:;" @click="toggle">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code6')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- default --&gt;
    &lt;div x-data=&quot;dropdown&quot; @click.outside=&quot;open = false&quot; class=&quot;dropdown&quot;&gt;
        &lt;button class=&quot;btn btn-success btn-lg dropdown-toggle&quot; @click=&quot;toggle&quot;&gt;Large Button
            &lt;svg&gt; ... &lt;/svg&gt;&lt;/button&gt;
        &lt;ul x-cloak x-show=&quot;open&quot; x-transition x-transition.duration.300ms class=&quot;ltr:right-0 rtl:left-0 whitespace-nowrap&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Separated link&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/div&gt;

    &lt;!-- outline --&gt;
    &lt;div x-data=&quot;dropdown&quot; @click.outside=&quot;open = false&quot; class=&quot;dropdown&quot;&gt;
        &lt;button class=&quot;btn btn-outline-success btn-lg dropdown-toggle&quot; @click=&quot;toggle&quot;&gt;Large Button
            &lt;svg&gt; ... &lt;/svg&gt;&lt;/button&gt;
        &lt;ul x-cloak x-show=&quot;open&quot; x-transition x-transition.duration.300ms class=&quot;ltr:right-0 rtl:left-0 whitespace-nowrap&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Separated link&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
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

                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Grouped Dropdown Buttons</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code7')"><span class="flex items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                    <path
                                        d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round"></path>
                                    <path
                                        d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                                Code </span> </a>
                    </div>
                    <div class="mb-5">
                        <div class="flex flex-wrap w-full justify-around gap-7">
                            <div class="flex items-center justify-center">
                                <div class="relative inline-flex align-middle">
                                    <button type="button"
                                        class="btn btn-secondary ltr:rounded-r-none rtl:rounded-l-none">1</button>
                                    <button type="button" class="btn btn-secondary rounded-none">2</button>
                                    <div class="relative inline-flex align-middle">
                                        <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                            <button type="button"
                                                class="btn dropdown-toggle btn-secondary flex ltr:rounded-l-none rtl:rounded-r-none"
                                                @click="toggle">Dropdown
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="w-4 h-4 ltr:ml-1 rtl:mr-1 inline-block">
                                                    <path d="M19 9L12 15L5 9" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                            <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                                class="ltr:right-0 rtl:left-0 whitespace-nowrap">
                                                <li><a href="javascript:;" @click="toggle">Action</a></li>
                                                <li><a href="javascript:;" @click="toggle">Another action</a></li>
                                                <li><a href="javascript:;" @click="toggle">Something else here</a>
                                                </li>
                                                <li><a href="javascript:;" @click="toggle">Separated link</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                <div class="relative inline-flex align-middle">
                                    <button type="button"
                                        class="btn btn-outline-secondary ltr:border-r-0 rtl:border-l-0 ltr:rounded-r-none rtl:rounded-l-none">1</button>
                                    <button type="button"
                                        class="btn btn-outline-secondary ltr:border-r-0 rtl:border-l-0 rounded-none">2</button>
                                    <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                        <button type="button"
                                            class="btn dropdown-toggle btn-outline-secondary flex ltr:rounded-l-none rtl:rounded-r-none"
                                            @click="toggle">Dropdown
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4 ltr:ml-1 rtl:mr-1 inline-block">
                                                <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                        <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                            class="ltr:right-0 rtl:left-0 whitespace-nowrap">
                                            <li><a href="javascript:;" @click="toggle">Action</a></li>
                                            <li><a href="javascript:;" @click="toggle">Another action</a></li>
                                            <li><a href="javascript:;" @click="toggle">Something else here</a></li>
                                            <li><a href="javascript:;" @click="toggle">Separated link</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code7')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- default --&gt;
    &lt;div class=&quot;relative inline-flex align-middle&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-secondary ltr:rounded-r-none rtl:rounded-l-none&quot;&gt;1&lt;/button&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-secondary rounded-none&quot;&gt;2&lt;/button&gt;
        &lt;div class=&quot;relative inline-flex align-middle&quot;&gt;
            &lt;div x-data=&quot;dropdown&quot; @click.outside=&quot;open = false&quot; class=&quot;dropdown&quot;&gt;
                &lt;button type=&quot;button&quot; class=&quot;btn dropdown-toggle btn-secondary flex ltr:rounded-l-none rtl:rounded-r-none&quot; @click=&quot;toggle&quot;&gt;Dropdown
                    &lt;svg&gt; ... &lt;/svg&gt;
                &lt;/button&gt;
                &lt;ul x-cloak x-show=&quot;open&quot; x-transition x-transition.duration.300ms class=&quot;ltr:right-0 rtl:left-0 whitespace-nowrap&quot;&gt;
                    &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Action&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Separated link&lt;/a&gt;&lt;/li&gt;
                &lt;/ul&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- outline --&gt;
    &lt;div class=&quot;relative inline-flex align-middle&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-secondary ltr:border-r-0 rtl:border-l-0 ltr:rounded-r-none rtl:rounded-l-none&quot;&gt;1&lt;/button&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-secondary ltr:border-r-0 rtl:border-l-0 rounded-none&quot;&gt;2&lt;/button&gt;
        &lt;div x-data=&quot;dropdown&quot; @click.outside=&quot;open = false&quot; class=&quot;dropdown&quot;&gt;
            &lt;button type=&quot;button&quot; class=&quot;btn dropdown-toggle btn-outline-secondary flex ltr:rounded-l-none rtl:rounded-r-none&quot; @click=&quot;toggle&quot;&gt;Dropdown
                &lt;svg&gt; ... &lt;/svg&gt;
            &lt;/button&gt;
            &lt;ul x-cloak x-show=&quot;open&quot; x-transition x-transition.duration.300ms class=&quot;ltr:right-0 rtl:left-0 whitespace-nowrap&quot;&gt;
                &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Action&lt;/a&gt;&lt;/li&gt;
                &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
                &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
                &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Separated link&lt;/a&gt;&lt;/li&gt;
            &lt;/ul&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
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

                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Split</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code8')"><span class="flex items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                    <path
                                        d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round"></path>
                                    <path
                                        d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                                Code </span> </a>
                    </div>
                    <div class="mb-5">
                        <div class="flex flex-wrap w-full justify-around gap-7">
                            <div class="flex items-center justify-center">
                                <div class="dropdown inline-flex" x-data="dropdown"
                                    @click.outside="open = false">
                                    <button type="button"
                                        class="btn btn-primary ltr:rounded-r-none rtl:rounded-l-none">Action</button>
                                    <button type="button"
                                        class="btn dropdown-toggle btn-primary ltr:rounded-l-none rtl:rounded-r-none border-l-[#4468fd] before:border-[5px] before:border-l-transparent before:border-r-transparent before:border-t-inherit before:border-b-0 before:inline-block before:border-t-white-light"
                                        @click="toggle">
                                        <span class="sr-only">Toggle dropdown</span>
                                    </button>
                                    <ul role="menu" x-cloak x-show="open" x-transition x-transition.duration.300ms
                                        class="ltr:right-0 rtl:left-0 top-full whitespace-nowrap">
                                        <li><a href="javascript:;" @click="toggle">Action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Another action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Something else here</a></li>
                                        <li><a href="javascript:;" @click="toggle">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                <div class="dropdown inline-flex" x-data="dropdown"
                                    @click.outside="open = false">
                                    <button type="button"
                                        class="btn btn-outline-primary ltr:rounded-r-none rtl:rounded-l-none">Action</button>
                                    <button type="button"
                                        class="btn btn-outline-primary ltr:rounded-l-none rtl:rounded-r-none dropdown-toggle before:border-[5px] before:border-l-transparent before:border-r-transparent before:border-t-inherit before:border-b-0 before:inline-block hover:before:border-t-white-light"
                                        @click="toggle">
                                        <span class="sr-only">Toggle dropdown</span>
                                    </button>
                                    <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                        class="ltr:right-0 rtl:left-0 top-full whitespace-nowrap">
                                        <li><a href="javascript:;" @click="toggle">Action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Another action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Something else here</a></li>
                                        <li><a href="javascript:;" @click="toggle">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code8')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- default --&gt;
    &lt;div class=&quot;dropdown inline-flex&quot; x-data=&quot;dropdown&quot; @click.outside=&quot;open = false&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-primary ltr:rounded-r-none rtl:rounded-l-none&quot;&gt;Action&lt;/button&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn dropdown-toggle btn-primary ltr:rounded-l-none rtl:rounded-r-none border-l-[#4468fd] before:border-[5px] before:border-l-transparent before:border-r-transparent before:border-t-inherit before:border-b-0 before:inline-block before:border-t-white-light&quot; @click=&quot;toggle&quot;&gt;
            &lt;span class=&quot;sr-only&quot;&gt;Toggle dropdown&lt;/span&gt;
        &lt;/button&gt;
        &lt;ul role=&quot;menu&quot; x-cloak x-show=&quot;open&quot; x-transition x-transition.duration.300ms class=&quot;ltr:right-0 rtl:left-0 top-full whitespace-nowrap&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Separated link&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/div&gt;

    &lt;!-- outline --&gt;
    &lt;div class=&quot;dropdown inline-flex&quot; x-data=&quot;dropdown&quot; @click.outside=&quot;open = false&quot;&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-primary ltr:rounded-r-none rtl:rounded-l-none&quot;&gt;Action&lt;/button&gt;
        &lt;button type=&quot;button&quot; class=&quot;btn btn-outline-primary ltr:rounded-l-none rtl:rounded-r-none dropdown-toggle before:border-[5px] before:border-l-transparent before:border-r-transparent before:border-t-inherit before:border-b-0 before:inline-block hover:before:border-t-white-light&quot; @click=&quot;toggle&quot;&gt;
            &lt;span class=&quot;sr-only&quot;&gt;Toggle dropdown&lt;/span&gt;
        &lt;/button&gt;
        &lt;ul x-cloak x-show=&quot;open&quot; x-transition x-transition.duration.300ms class=&quot;ltr:right-0 rtl:left-0 top-full whitespace-nowrap&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Separated link&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
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

                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Custom Dropdown</h5>
                        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                            href="javascript:;" @click="toggleCode('code9')"><span class="flex items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                    <path
                                        d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path opacity="0.5" d="M13.9868 5L10.0132 19.8297" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round"></path>
                                    <path
                                        d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                                Code </span> </a>
                    </div>
                    <div class="mb-5">
                        <div class="flex w-full flex-wrap justify-around">
                            <div class="flex items-center justify-center">
                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                    <button
                                        class="btn p-0 rounded-none border-0 shadow-none dropdown-toggle text-black dark:text-white-dark hover:text-primary dark:hover:text-primary"
                                        @click="toggle">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 rotate-90 opacity-70">
                                            <circle cx="5" cy="12" r="2"
                                                stroke="currentColor" stroke-width="1.5"></circle>
                                            <circle opacity="0.5" cx="12" cy="12" r="2"
                                                stroke="currentColor" stroke-width="1.5"></circle>
                                            <circle cx="19" cy="12" r="2"
                                                stroke="currentColor" stroke-width="1.5"></circle>
                                        </svg>
                                    </button>
                                    <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                        class="ltr:left-0 rtl:right-0 bottom-full !mt-0 mb-1 whitespace-nowrap">
                                        <li><a href="javascript:;" @click="toggle">Action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Another action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Something else here</a></li>
                                        <li><a href="javascript:;" @click="toggle">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                    <button
                                        class="btn p-0 rounded-none border-0 shadow-none dropdown-toggle text-black dark:text-white-dark hover:text-primary dark:hover:text-primary"
                                        @click="toggle">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 opacity-70">
                                            <circle cx="5" cy="12" r="2"
                                                stroke="currentColor" stroke-width="1.5"></circle>
                                            <circle opacity="0.5" cx="12" cy="12" r="2"
                                                stroke="currentColor" stroke-width="1.5"></circle>
                                            <circle cx="19" cy="12" r="2"
                                                stroke="currentColor" stroke-width="1.5"></circle>
                                        </svg>
                                    </button>
                                    <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                        class="ltr:left-0 rtl:right-0 bottom-full !mt-0 mb-1 whitespace-nowrap">
                                        <li><a href="javascript:;" @click="toggle">Action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Another action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Something else here</a></li>
                                        <li><a href="javascript:;" @click="toggle">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                    <button
                                        class="btn p-0 rounded-none border-0 shadow-none dropdown-toggle text-black dark:text-white-dark hover:text-primary dark:hover:text-primary"
                                        @click="toggle">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 rotate-90 opacity-70">
                                            <circle cx="5" cy="12" r="2"
                                                stroke="currentColor" stroke-width="1.5"></circle>
                                            <circle opacity="0.5" cx="12" cy="12" r="2"
                                                stroke="currentColor" stroke-width="1.5"></circle>
                                            <circle cx="19" cy="12" r="2"
                                                stroke="currentColor" stroke-width="1.5"></circle>
                                        </svg>
                                    </button>
                                    <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                        class="ltr:left-0 rtl:right-0 bottom-full !mt-0 mb-1 whitespace-nowrap">
                                        <li><a href="javascript:;" @click="toggle">Action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Another action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Something else here</a></li>
                                        <li><a href="javascript:;" @click="toggle">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                    <button
                                        class="btn p-0 rounded-none border-0 shadow-none dropdown-toggle text-black dark:text-white-dark hover:text-primary dark:hover:text-primary"
                                        @click="toggle">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 opacity-70">
                                            <circle cx="5" cy="12" r="2"
                                                stroke="currentColor" stroke-width="1.5"></circle>
                                            <circle opacity="0.5" cx="12" cy="12" r="2"
                                                stroke="currentColor" stroke-width="1.5"></circle>
                                            <circle cx="19" cy="12" r="2"
                                                stroke="currentColor" stroke-width="1.5"></circle>
                                        </svg>
                                    </button>
                                    <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                        class="ltr:right-0 rtl:left-0 bottom-full !mt-0 mb-1 whitespace-nowrap">
                                        <li><a href="javascript:;" @click="toggle">Action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Another action</a></li>
                                        <li><a href="javascript:;" @click="toggle">Something else here</a></li>
                                        <li><a href="javascript:;" @click="toggle">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code9')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- custom --&gt;
    &lt;div x-data=&quot;dropdown&quot; @click.outside=&quot;open = false&quot; class=&quot;dropdown&quot;&gt;
        &lt;button class=&quot;btn p-0 rounded-none border-0 shadow-none dropdown-toggle text-black dark:text-white-dark hover:text-primary dark:hover:text-primary&quot; @click=&quot;toggle&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
        &lt;ul x-cloak x-show=&quot;open&quot; x-transition x-transition.duration.300ms class=&quot;ltr:left-0 rtl:right-0 bottom-full !mt-0 mb-1 whitespace-nowrap&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Separated link&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/div&gt;

    &lt;div x-data=&quot;dropdown&quot; @click.outside=&quot;open = false&quot; class=&quot;dropdown&quot;&gt;
        &lt;button class=&quot;btn p-0 rounded-none border-0 shadow-none dropdown-toggle text-black dark:text-white-dark hover:text-primary dark:hover:text-primary&quot; @click=&quot;toggle&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
        &lt;ul x-cloak x-show=&quot;open&quot; x-transition x-transition.duration.300ms class=&quot;ltr:left-0 rtl:right-0 bottom-full !mt-0 mb-1 whitespace-nowrap&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Separated link&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/div&gt;

    &lt;div x-data=&quot;dropdown&quot; @click.outside=&quot;open = false&quot; class=&quot;dropdown&quot;&gt;
        &lt;button class=&quot;btn p-0 rounded-none border-0 shadow-none dropdown-toggle text-black dark:text-white-dark hover:text-primary dark:hover:text-primary&quot; @click=&quot;toggle&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
        &lt;ul x-cloak x-show=&quot;open&quot; x-transition x-transition.duration.300ms class=&quot;ltr:left-0 rtl:right-0 bottom-full !mt-0 mb-1 whitespace-nowrap&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Separated link&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/div&gt;

    &lt;div x-data=&quot;dropdown&quot; @click.outside=&quot;open = false&quot; class=&quot;dropdown&quot;&gt;
        &lt;button class=&quot;btn p-0 rounded-none border-0 shadow-none dropdown-toggle text-black dark:text-white-dark hover:text-primary dark:hover:text-primary&quot; @click=&quot;toggle&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
        &lt;ul x-cloak x-show=&quot;open&quot; x-transition x-transition.duration.300ms class=&quot;ltr:right-0 rtl:left-0 bottom-full !mt-0 mb-1 whitespace-nowrap&quot;&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Another action&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Something else here&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href=&quot;javascript:;&quot; @click=&quot;toggle&quot;&gt;Separated link&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
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
