<x-layout.default>

    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Elements</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Tooltips</span>
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
                <span class="ltr:mr-3 rtl:ml-3">Documentation: </span><a href="https://www.npmjs.com/package/tippy.js"
                    target="_blank" class="block hover:underline">https://www.npmjs.com/package/tippy.js</a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Default</h5>
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
                                Code</span></a>
                    </div>
                    <div class="mb-5">
                        <div class="flex justify-center w-full gap-4">
                            <a href="javascript:;" x-tooltip="Tooltip using ANCHOR tag"
                                class="btn bg-primary btn-primary">Link</a>
                            <button type="button" x-tooltip="Tooltip using BUTTON tag"
                                class="btn btn-success">Button</button>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code1')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- link --&gt;
    &lt;a href=&quot;javascript:;&quot; x-tooltip=&quot;Tooltip using ANCHOR tag&quot; class=&quot;btn bg-primary btn-primary&quot;&gt;Link&lt;/a&gt;

    &lt;!-- button --&gt;
    &lt;button type=&quot;button&quot; x-tooltip=&quot;Tooltip using BUTTON tag&quot; class=&quot;btn btn-success&quot;&gt;Button&lt;/button&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.directive(&quot;tooltip&quot;, (el, {
                expression
            }) =&gt; {
                tippy(el, {
                    content: expression,
                    placement: el.getAttribute(&quot;data-placement&quot;) || undefined,
                    allowHTML: true,
                    delay: el.getAttribute(&quot;data-delay&quot;) || 0,
                    animation: el.getAttribute(&quot;data-animation&quot;) || &quot;fade&quot;,
                    theme: el.getAttribute(&quot;data-theme&quot;) || &quot;&quot;,
                });
            });

            &lt;!-- $tooltip --&gt;
            Alpine.magic(&quot;tooltip&quot;, (el) =&gt; (message, placement) =&gt; {
                let instance = tippy(el, {
                    content: message,
                    trigger: &quot;manual&quot;,
                    placement: placement || undefined,
                    allowHTML: true,
                });

                instance.show();
            });
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Placement</h5>
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
                                Code</span></a>
                    </div>
                    <div class="mb-5">
                        <div class="flex flex-wrap justify-center gap-4 w-full">
                            <button type="button" x-tooltip="Tooltip on top" data-placement="top" role="tooltip"
                                class="btn btn-info">Tooltip on top</button>
                            <button type="button" x-tooltip="Tooltip on left"
                                :data-placement="$store.app.rtlClass === 'rtl' ? 'right' : 'left'"
                                class="btn btn-secondary">Tooltip on left</button>
                            <button type="button" x-tooltip="Tooltip on bottom" data-placement="bottom"
                                role="tooltip" class="btn btn-warning">Tooltip on bottom</button>
                            <button type="button" x-tooltip="Tooltip on right"
                                :data-placement="$store.app.rtlClass === 'rtl' ? 'left' : 'right'" role="tooltip"
                                class="btn btn-danger">Tooltip on right</button>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code2')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- top --&gt;
    &lt;button type=&quot;button&quot; x-tooltip=&quot;Tooltip on top&quot; data-placement=&quot;top&quot; role=&quot;tooltip&quot; class=&quot;btn btn-info&quot;&gt;Tooltip on top&lt;/button&gt;

    &lt;!-- left --&gt;
    &lt;button type=&quot;button&quot; x-tooltip=&quot;Tooltip on left&quot; :data-placement=&quot;$store.app.rtlClass === 'rtl' ? 'right' : 'left'&quot; class=&quot;btn btn-secondary&quot;&gt;Tooltip on left&lt;/button&gt;

    &lt;!-- bottom --&gt;
    &lt;button type=&quot;button&quot; x-tooltip=&quot;Tooltip on bottom&quot; data-placement=&quot;bottom&quot; role=&quot;tooltip&quot; class=&quot;btn btn-warning&quot;&gt;Tooltip on bottom&lt;/button&gt;

    &lt;!-- right --&gt;
    &lt;button type=&quot;button&quot; x-tooltip=&quot;Tooltip on right&quot; :data-placement=&quot;$store.app.rtlClass === 'rtl' ? 'left' : 'right'&quot; role=&quot;tooltip&quot; class=&quot;btn btn-danger&quot;&gt;Tooltip on right&lt;/button&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.directive(&quot;tooltip&quot;, (el, {
                expression
            }) =&gt; {
                tippy(el, {
                    content: expression,
                    placement: el.getAttribute(&quot;data-placement&quot;) || undefined,
                    allowHTML: true,
                    delay: el.getAttribute(&quot;data-delay&quot;) || 0,
                    animation: el.getAttribute(&quot;data-animation&quot;) || &quot;fade&quot;,
                    theme: el.getAttribute(&quot;data-theme&quot;) || &quot;&quot;,
                });
            });
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <div class="panel lg:row-start-1 lg:col-start-2">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">HTML</h5>
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
                                Code</span></a>
                    </div>
                    <div class="mb-5">
                        <div class="flex justify-center gap-4 w-full">
                            <button type="button" x-tooltip="<strong>Bolded content</strong>"
                                class="btn btn-dark">Tooltip on HTML</button>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code3')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- html --&gt;
    &lt;button type=&quot;button&quot; x-tooltip=&quot;&lt;strong&gt;Bolded content&lt;/strong&gt;&quot; class=&quot;btn btn-dark&quot;&gt;Tooltip on HTML&lt;/button&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.directive(&quot;tooltip&quot;, (el, {
                expression
            }) =&gt; {
                tippy(el, {
                    content: expression,
                    placement: el.getAttribute(&quot;data-placement&quot;) || undefined,
                    allowHTML: true,
                    delay: el.getAttribute(&quot;data-delay&quot;) || 0,
                    animation: el.getAttribute(&quot;data-animation&quot;) || &quot;fade&quot;,
                    theme: el.getAttribute(&quot;data-theme&quot;) || &quot;&quot;,
                });
            });
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Options</h5>
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
                                Code</span></a>
                    </div>
                    <div class="mb-5">
                        <div class="flex flex-wrap justify-center gap-4 w-full">
                            <button type="button" @click="$tooltip('On click')" class="btn btn-primary">On
                                Click</button>
                            <button type="button" @focus="$tooltip('On focus')" class="btn btn-secondary">On
                                Focus</button>
                            <button type="button" x-tooltip="Delay 1s" data-delay='1000'
                                class="btn btn-info">Delay</button>
                            <button type="button" x-tooltip="Disable Animation" data-animation="false"
                                class="btn btn-dark">Disabled Animation</button>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code4')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- click --&gt;
    &lt;button type=&quot;button&quot; @click=&quot;$tooltip('On click')&quot; class=&quot;btn btn-primary&quot;&gt;On Click&lt;/button&gt;

    &lt;!-- focus --&gt;
    &lt;button type=&quot;button&quot; @focus=&quot;$tooltip('On focus')&quot; class=&quot;btn btn-secondary&quot;&gt;On Focus&lt;/button&gt;

    &lt;!-- delay --&gt;
    &lt;button type=&quot;button&quot; x-tooltip=&quot;Delay 1s&quot; data-delay='1000' class=&quot;btn btn-info&quot;&gt;Delay&lt;/button&gt;

    &lt;!-- disabled animation --&gt;
    &lt;button type=&quot;button&quot; x-tooltip=&quot;Disable Animation&quot; data-animation=&quot;false&quot; class=&quot;btn btn-dark&quot;&gt;Disabled Animation&lt;/button&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.directive(&quot;tooltip&quot;, (el, {
                expression
            }) =&gt; {
                tippy(el, {
                    content: expression,
                    placement: el.getAttribute(&quot;data-placement&quot;) || undefined,
                    allowHTML: true,
                    delay: el.getAttribute(&quot;data-delay&quot;) || 0,
                    animation: el.getAttribute(&quot;data-animation&quot;) || &quot;fade&quot;,
                    theme: el.getAttribute(&quot;data-theme&quot;) || &quot;&quot;,
                });
            });

            &lt;!-- $tooltip --&gt;
            Alpine.magic(&quot;tooltip&quot;, (el) =&gt; (message, placement) =&gt; {
                let instance = tippy(el, {
                    content: message,
                    trigger: &quot;manual&quot;,
                    placement: placement || undefined,
                    allowHTML: true,
                });

                instance.show();
            });
        });
    &lt;/script&gt;
    </pre>
                    </template>
                </div>

                <div class="panel lg:col-span-2">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Colors</h5>
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
                                Code</span></a>
                    </div>
                    <div class="mb-5">
                        <div class="flex flex-wrap justify-center gap-4 w-full">
                            <button type="button" x-tooltip="Primary" data-theme="primary"
                                class="btn btn-primary">Primary</button>
                            <button type="button" x-tooltip="Success" data-theme="success"
                                class="btn btn-success">Success</button>
                            <button type="button" x-tooltip="Info" data-theme="info"
                                class="btn btn-info">Info</button>
                            <button type="button" x-tooltip="Danger" data-theme="danger"
                                class="btn btn-danger">Danger</button>
                            <button type="button" x-tooltip="Warning" data-theme="warning"
                                class="btn btn-warning">Warning</button>
                            <button type="button" x-tooltip="Secondary" data-theme="secondary"
                                class="btn btn-secondary">Secondary</button>
                            <button type="button" x-tooltip="Dark" data-theme="dark"
                                class="btn btn-dark">Dark</button>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code5')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- primary --&gt;
    &lt;button type=&quot;button&quot; x-tooltip=&quot;Primary&quot; data-theme=&quot;primary&quot; class=&quot;btn btn-primary&quot;&gt;Primary&lt;/button&gt;

    &lt;!-- success --&gt;
    &lt;button type=&quot;button&quot; x-tooltip=&quot;Success&quot; data-theme=&quot;success&quot; class=&quot;btn btn-success&quot;&gt;Success&lt;/button&gt;

    &lt;!-- info --&gt;
    &lt;button type=&quot;button&quot; x-tooltip=&quot;Info&quot; data-theme=&quot;info&quot; class=&quot;btn btn-info&quot;&gt;Info&lt;/button&gt;

    &lt;!-- danger --&gt;
    &lt;button type=&quot;button&quot; x-tooltip=&quot;Danger&quot; data-theme=&quot;danger&quot; class=&quot;btn btn-danger&quot;&gt;Danger&lt;/button&gt;

    &lt;!-- warning --&gt;
    &lt;button type=&quot;button&quot; x-tooltip=&quot;Warning&quot; data-theme=&quot;warning&quot; class=&quot;btn btn-warning&quot;&gt;Warning&lt;/button&gt;

    &lt;!-- secondary --&gt;
    &lt;button type=&quot;button&quot; x-tooltip=&quot;Secondary&quot; data-theme=&quot;secondary&quot; class=&quot;btn btn-secondary&quot;&gt;Secondary&lt;/button&gt;

    &lt;!-- dark --&gt;
    &lt;button type=&quot;button&quot; x-tooltip=&quot;Dark&quot; data-theme=&quot;dark&quot; class=&quot;btn btn-dark&quot;&gt;Dark&lt;/button&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.directive(&quot;tooltip&quot;, (el, {
                expression
            }) =&gt; {
                tippy(el, {
                    content: expression,
                    placement: el.getAttribute(&quot;data-placement&quot;) || undefined,
                    allowHTML: true,
                    delay: el.getAttribute(&quot;data-delay&quot;) || 0,
                    animation: el.getAttribute(&quot;data-animation&quot;) || &quot;fade&quot;,
                    theme: el.getAttribute(&quot;data-theme&quot;) || &quot;&quot;,
                });
            });
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

                init() {
                    const instance = tippy(document.querySelector('#btn-left'));
                    this.$watch('$store.app.rtlClass', () => {
                        instance.destroy();
                    });
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
</x-layout.default>
