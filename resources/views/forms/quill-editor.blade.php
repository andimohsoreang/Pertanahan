<x-layout.default>


    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}" />
    <script src="/assets/js/quill.js"></script>

    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Forms</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Quill Editor</span>
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
                <span class="ltr:mr-3 rtl:ml-3">Documentation: </span><a href="https://www.npmjs.com/package/quilljs"
                    target="_blank" class="block hover:underline">https://www.npmjs.com/package/quilljs</a>
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
                        <div id="editor">
                            <h1>This is a heading text...</h1>
                            <br />
                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dui arcu, pellentesque id
                                mattis sed, mattis semper erat. Etiam commodo arcu a mollis consequat. Curabitur pretium
                                auctor tortor, bibendum placerat elit feugiat et. Ut ac turpis nec dui ullamcorper
                                ornare. Vestibulum finibus quis magna at accumsan. Praesent a purus vitae tortor
                                fringilla tempus vel non purus. Suspendisse eleifend nibh porta dolor ullamcorper
                                laoreet. Ut sit amet ipsum vitae lectus pharetra tincidunt. In ipsum quam, iaculis at
                                erat ut, fermentum efficitur ipsum. Nunc odio diam, fringilla in auctor et, scelerisque
                                at lorem. Sed convallis tempor dolor eu dictum. Cras ornare ornare imperdiet.
                                Pellentesque sagittis lacus non libero fringilla faucibus. Aenean ullamcorper enim et
                                metus vestibulum, eu aliquam nunc placerat. Praesent fringilla dolor sit amet leo
                                pulvinar semper. </p>
                            <br />
                            <p> Curabitur vel tincidunt dui. Duis vestibulum eget velit sit amet aliquet. Curabitur
                                vitae cursus ex. Aliquam pulvinar vulputate ullamcorper. Maecenas luctus in eros et
                                aliquet. Cras auctor luctus nisl a consectetur. Morbi hendrerit nisi nunc, quis egestas
                                nibh consectetur nec. Aliquam vel lorem enim. Vestibulum ante ipsum primis in faucibus
                                orci luctus et ultrices posuere cubilia Curae; Nunc placerat, enim quis varius luctus,
                                enim arcu tincidunt purus, in vulputate tortor mi a tortor. Praesent porta ornare
                                fermentum. Praesent sed ligula at ante tempor posuere a at lorem. </p>
                            <br />
                            <p> Curabitur vel tincidunt dui. Duis vestibulum eget velit sit amet aliquet. Curabitur
                                vitae cursus ex. Aliquam pulvinar vulputate ullamcorper. Maecenas luctus in eros et
                                aliquet. Cras auctor luctus nisl a consectetur. Morbi hendrerit nisi nunc, quis egestas
                                nibh consectetur nec. Aliquam vel lorem enim. Vestibulum ante ipsum primis in faucibus
                                orci luctus et ultrices posuere cubilia Curae; Nunc placerat, enim quis varius luctus,
                                enim arcu tincidunt purus, in vulputate tortor mi a tortor. Praesent porta ornare
                                fermentum. Praesent sed ligula at ante tempor posuere a at lorem. </p>
                            <br />
                            <p> Aliquam diam felis, vehicula ut ipsum eu, consectetur tincidunt ipsum. Vestibulum sed
                                metus ac nisi tincidunt mollis sed non urna. Vivamus lacinia ullamcorper interdum. Sed
                                sed erat vel leo venenatis pretium. Sed aliquet sem nunc, ut iaculis dolor consectetur
                                et. Vivamus ligula sapien, maximus nec pellentesque ut, imperdiet at libero. Vivamus
                                semper nulla lectus, id dapibus nulla convallis id. Quisque elementum lectus ac dui
                                gravida, ut molestie nunc convallis. Pellentesque et odio non dolor convallis commodo
                                sit amet a ante. </p>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code1')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- basic --&gt;
    &lt;div id=&quot;editor&quot;&gt;
        &lt;h1&gt;This is a heading text...&lt;/h1&gt;
        &lt;br /&gt;
        &lt;p&gt; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dui arcu, pellentesque id mattis sed, mattis semper erat. Etiam commodo arcu a mollis consequat. Curabitur pretium auctor tortor, bibendum placerat elit feugiat et. Ut ac turpis nec dui ullamcorper ornare. Vestibulum finibus quis magna at accumsan. Praesent a purus vitae tortor fringilla tempus vel non purus. Suspendisse eleifend nibh porta dolor ullamcorper laoreet. Ut sit amet ipsum vitae lectus pharetra tincidunt. In ipsum quam, iaculis at erat ut, fermentum efficitur ipsum. Nunc odio diam, fringilla in auctor et, scelerisque at lorem. Sed convallis tempor dolor eu dictum. Cras ornare ornare imperdiet. Pellentesque sagittis lacus non libero fringilla faucibus. Aenean ullamcorper enim et metus vestibulum, eu aliquam nunc placerat. Praesent fringilla dolor sit amet leo pulvinar semper. &lt;/p&gt;
        &lt;br /&gt;
        &lt;p&gt; Curabitur vel tincidunt dui. Duis vestibulum eget velit sit amet aliquet. Curabitur vitae cursus ex. Aliquam pulvinar vulputate ullamcorper. Maecenas luctus in eros et aliquet. Cras auctor luctus nisl a consectetur. Morbi hendrerit nisi nunc, quis egestas nibh consectetur nec. Aliquam vel lorem enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc placerat, enim quis varius luctus, enim arcu tincidunt purus, in vulputate tortor mi a tortor. Praesent porta ornare fermentum. Praesent sed ligula at ante tempor posuere a at lorem. &lt;/p&gt;
        &lt;br /&gt;
        &lt;p&gt; Curabitur vel tincidunt dui. Duis vestibulum eget velit sit amet aliquet. Curabitur vitae cursus ex. Aliquam pulvinar vulputate ullamcorper. Maecenas luctus in eros et aliquet. Cras auctor luctus nisl a consectetur. Morbi hendrerit nisi nunc, quis egestas nibh consectetur nec. Aliquam vel lorem enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc placerat, enim quis varius luctus, enim arcu tincidunt purus, in vulputate tortor mi a tortor. Praesent porta ornare fermentum. Praesent sed ligula at ante tempor posuere a at lorem. &lt;/p&gt;
        &lt;br /&gt;
        &lt;p&gt; Aliquam diam felis, vehicula ut ipsum eu, consectetur tincidunt ipsum. Vestibulum sed metus ac nisi tincidunt mollis sed non urna. Vivamus lacinia ullamcorper interdum. Sed sed erat vel leo venenatis pretium. Sed aliquet sem nunc, ut iaculis dolor consectetur et. Vivamus ligula sapien, maximus nec pellentesque ut, imperdiet at libero. Vivamus semper nulla lectus, id dapibus nulla convallis id. Quisque elementum lectus ac dui gravida, ut molestie nunc convallis. Pellentesque et odio non dolor convallis commodo sit amet a ante. &lt;/p&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        new Quill('#editor', {
            theme: 'snow'
        });
        var toolbar = quill.container.previousSibling;
        toolbar.querySelector('.ql-picker').setAttribute('title', 'Font Size');
        toolbar.querySelector('button.ql-bold').setAttribute('title', 'Bold');
        toolbar.querySelector('button.ql-italic').setAttribute('title', 'Italic');
        toolbar.querySelector('button.ql-link').setAttribute('title', 'Link');
        toolbar.querySelector('button.ql-underline').setAttribute('title', 'Underline');
        toolbar.querySelector('button.ql-clean').setAttribute('title', 'Clear Formatting');
        toolbar.querySelector('[value=ordered]').setAttribute('title', 'Ordered List');
        toolbar.querySelector('[value=bullet]').setAttribute('title', 'Bullet List');
    &lt;/script&gt;
    </pre>
                    </template>
                </div>
                <!-- With Tooltip -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">With Tooltip</h5>
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
                        <div id="editor1">
                            <h1>This is a heading text...</h1>
                            <br />
                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dui arcu, pellentesque id
                                mattis sed, mattis semper erat. Etiam commodo arcu a mollis consequat. Curabitur pretium
                                auctor tortor, bibendum placerat elit feugiat et. Ut ac turpis nec dui ullamcorper
                                ornare. Vestibulum finibus quis magna at accumsan. Praesent a purus vitae tortor
                                fringilla tempus vel non purus. Suspendisse eleifend nibh porta dolor ullamcorper
                                laoreet. Ut sit amet ipsum vitae lectus pharetra tincidunt. In ipsum quam, iaculis at
                                erat ut, fermentum efficitur ipsum. Nunc odio diam, fringilla in auctor et, scelerisque
                                at lorem. Sed convallis tempor dolor eu dictum. Cras ornare ornare imperdiet.
                                Pellentesque sagittis lacus non libero fringilla faucibus. Aenean ullamcorper enim et
                                metus vestibulum, eu aliquam nunc placerat. Praesent fringilla dolor sit amet leo
                                pulvinar semper. </p>
                            <br />
                            <p> Curabitur vel tincidunt dui. Duis vestibulum eget velit sit amet aliquet. Curabitur
                                vitae cursus ex. Aliquam pulvinar vulputate ullamcorper. Maecenas luctus in eros et
                                aliquet. Cras auctor luctus nisl a consectetur. Morbi hendrerit nisi nunc, quis egestas
                                nibh consectetur nec. Aliquam vel lorem enim. Vestibulum ante ipsum primis in faucibus
                                orci luctus et ultrices posuere cubilia Curae; Nunc placerat, enim quis varius luctus,
                                enim arcu tincidunt purus, in vulputate tortor mi a tortor. Praesent porta ornare
                                fermentum. Praesent sed ligula at ante tempor posuere a at lorem. </p>
                            <br />
                            <p> Curabitur vel tincidunt dui. Duis vestibulum eget velit sit amet aliquet. Curabitur
                                vitae cursus ex. Aliquam pulvinar vulputate ullamcorper. Maecenas luctus in eros et
                                aliquet. Cras auctor luctus nisl a consectetur. Morbi hendrerit nisi nunc, quis egestas
                                nibh consectetur nec. Aliquam vel lorem enim. Vestibulum ante ipsum primis in faucibus
                                orci luctus et ultrices posuere cubilia Curae; Nunc placerat, enim quis varius luctus,
                                enim arcu tincidunt purus, in vulputate tortor mi a tortor. Praesent porta ornare
                                fermentum. Praesent sed ligula at ante tempor posuere a at lorem. </p>
                            <br />
                            <p> Aliquam diam felis, vehicula ut ipsum eu, consectetur tincidunt ipsum. Vestibulum sed
                                metus ac nisi tincidunt mollis sed non urna. Vivamus lacinia ullamcorper interdum. Sed
                                sed erat vel leo venenatis pretium. Sed aliquet sem nunc, ut iaculis dolor consectetur
                                et. Vivamus ligula sapien, maximus nec pellentesque ut, imperdiet at libero. Vivamus
                                semper nulla lectus, id dapibus nulla convallis id. Quisque elementum lectus ac dui
                                gravida, ut molestie nunc convallis. Pellentesque et odio non dolor convallis commodo
                                sit amet a ante. </p>
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code2')">
                        <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- with tooltip --&gt;
    &lt;div id=&quot;editor1&quot;&gt;
        &lt;h1&gt;This is a heading text...&lt;/h1&gt;
        &lt;br /&gt;
        &lt;p&gt; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dui arcu, pellentesque id mattis sed, mattis semper erat. Etiam commodo arcu a mollis consequat. Curabitur pretium auctor tortor, bibendum placerat elit feugiat et. Ut ac turpis nec dui ullamcorper ornare. Vestibulum finibus quis magna at accumsan. Praesent a purus vitae tortor fringilla tempus vel non purus. Suspendisse eleifend nibh porta dolor ullamcorper laoreet. Ut sit amet ipsum vitae lectus pharetra tincidunt. In ipsum quam, iaculis at erat ut, fermentum efficitur ipsum. Nunc odio diam, fringilla in auctor et, scelerisque at lorem. Sed convallis tempor dolor eu dictum. Cras ornare ornare imperdiet. Pellentesque sagittis lacus non libero fringilla faucibus. Aenean ullamcorper enim et metus vestibulum, eu aliquam nunc placerat. Praesent fringilla dolor sit amet leo pulvinar semper. &lt;/p&gt;
        &lt;br /&gt;
        &lt;p&gt; Curabitur vel tincidunt dui. Duis vestibulum eget velit sit amet aliquet. Curabitur vitae cursus ex. Aliquam pulvinar vulputate ullamcorper. Maecenas luctus in eros et aliquet. Cras auctor luctus nisl a consectetur. Morbi hendrerit nisi nunc, quis egestas nibh consectetur nec. Aliquam vel lorem enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc placerat, enim quis varius luctus, enim arcu tincidunt purus, in vulputate tortor mi a tortor. Praesent porta ornare fermentum. Praesent sed ligula at ante tempor posuere a at lorem. &lt;/p&gt;
        &lt;br /&gt;
        &lt;p&gt; Curabitur vel tincidunt dui. Duis vestibulum eget velit sit amet aliquet. Curabitur vitae cursus ex. Aliquam pulvinar vulputate ullamcorper. Maecenas luctus in eros et aliquet. Cras auctor luctus nisl a consectetur. Morbi hendrerit nisi nunc, quis egestas nibh consectetur nec. Aliquam vel lorem enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc placerat, enim quis varius luctus, enim arcu tincidunt purus, in vulputate tortor mi a tortor. Praesent porta ornare fermentum. Praesent sed ligula at ante tempor posuere a at lorem. &lt;/p&gt;
        &lt;br /&gt;
        &lt;p&gt; Aliquam diam felis, vehicula ut ipsum eu, consectetur tincidunt ipsum. Vestibulum sed metus ac nisi tincidunt mollis sed non urna. Vivamus lacinia ullamcorper interdum. Sed sed erat vel leo venenatis pretium. Sed aliquet sem nunc, ut iaculis dolor consectetur et. Vivamus ligula sapien, maximus nec pellentesque ut, imperdiet at libero. Vivamus semper nulla lectus, id dapibus nulla convallis id. Quisque elementum lectus ac dui gravida, ut molestie nunc convallis. Pellentesque et odio non dolor convallis commodo sit amet a ante. &lt;/p&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        var quill = new Quill('#editor1', {
            theme: 'snow',
        });
        var toolbar = quill.container.previousSibling;
        toolbar.querySelector('.ql-picker').setAttribute('title', 'Font Size');
        toolbar.querySelector('button.ql-bold').setAttribute('title', 'Bold');
        toolbar.querySelector('button.ql-italic').setAttribute('title', 'Italic');
        toolbar.querySelector('button.ql-link').setAttribute('title', 'Link');
        toolbar.querySelector('button.ql-underline').setAttribute('title', 'Underline');
        toolbar.querySelector('button.ql-clean').setAttribute('title', 'Clear Formatting');
        toolbar.querySelector('[value=ordered]').setAttribute('title', 'Ordered List');
        toolbar.querySelector('[value=bullet]').setAttribute('title', 'Bullet List');
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
        new Quill('#editor', {
            theme: 'snow'
        });
        var quill = new Quill('#editor1', {
            theme: 'snow',
        });
        var toolbar = quill.container.previousSibling;
        toolbar.querySelector('.ql-picker').setAttribute('title', 'Font Size');
        toolbar.querySelector('button.ql-bold').setAttribute('title', 'Bold');
        toolbar.querySelector('button.ql-italic').setAttribute('title', 'Italic');
        toolbar.querySelector('button.ql-link').setAttribute('title', 'Link');
        toolbar.querySelector('button.ql-underline').setAttribute('title', 'Underline');
        toolbar.querySelector('button.ql-clean').setAttribute('title', 'Clear Formatting');
        toolbar.querySelector('[value=ordered]').setAttribute('title', 'Ordered List');
        toolbar.querySelector('[value=bullet]').setAttribute('title', 'Bullet List');

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
