<x-layout.default>

    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Forms</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Validation</span>
            </li>
        </ul>
        <div class="pt-5 grid grid-cols-1 xl:grid-cols-2 gap-6" x-data="form">
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
                    <form class="space-y-5" @submit.prevent="submitForm1()">
                        <div :class="[isSubmitForm1 ? (form1.name ? 'has-success' : 'has-error') : '']">
                            <label for="fullName">Full Name</label>
                            <input id="fullName" type="text" placeholder="Enter Full Name" class="form-input"
                                x-model="form1.name" />
                            <template x-if="isSubmitForm1 && form1.name">
                                <p class="text-[#1abc9c] mt-1">Looks Good!</p>
                            </template>
                            <template x-if="isSubmitForm1 && !form1.name">
                                <p class="text-danger mt-1">Please fill the Name</p>
                            </template>
                        </div>
                        <button type="submit" class="btn btn-primary !mt-6">Submit Form</button>
                    </form>
                </div>
                <template x-if="codeArr.includes('code1')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- basic --&gt;
    &lt;div x-data=&quot;form&quot;&gt;
        &lt;form class=&quot;space-y-5&quot; @submit.prevent=&quot;submitForm1()&quot;&gt;
            &lt;div :class=&quot;[isSubmitForm1 ? (form1.name ? 'has-success' : 'has-error') : '']&quot;&gt;
                &lt;label for=&quot;fullName&quot;&gt;Full Name&lt;/label&gt;
                &lt;input id=&quot;fullName&quot; type=&quot;text&quot; placeholder=&quot;Enter Full Name&quot; class=&quot;form-input&quot; x-model=&quot;form1.name&quot; /&gt;
                &lt;template x-if=&quot;isSubmitForm1 &amp;&amp; form1.name&quot;&gt;
                    &lt;p class=&quot;text-[#1abc9c] mt-1&quot;&gt;Looks Good!&lt;/p&gt;
                &lt;/template&gt;
                &lt;template x-if=&quot;isSubmitForm1 &amp;&amp; !form1.name&quot;&gt;
                    &lt;p class=&quot;text-danger mt-1&quot;&gt;Please fill the Name&lt;/p&gt;
                &lt;/template&gt;
            &lt;/div&gt;
            &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary !mt-6&quot;&gt;Submit Form&lt;/button&gt;
        &lt;/form&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
     document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;form&quot;, () =&gt; ({
                form1: {
                    name: ''
                },
                isSubmitForm1: false,
                submitForm1() {
                    this.isSubmitForm1 = true;
                    if (this.name) {
                        //form validated success
                        this.showMessage('Form submitted successfully.');
                    }
                },
                showMessage(msg = '', type = 'success') {
                    const toast = window.Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    toast.fire({
                        icon: type,
                        title: msg,
                        padding: '10px 20px'
                    });
                },
            }));
        });
    &lt;/script&gt;
    </pre>
                </template>
            </div>
            <!-- Email -->
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Email</h5>
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
                    <form class="space-y-5" @submit.prevent="submitForm2()">
                        <div
                            :class="[isSubmitForm2 ? (form2.email && emailValidate(form2.email) ? 'has-success' : 'has-error') :
                                ''
                            ]">
                            <label for="Email">Email</label>
                            <input id="Email" type="text" placeholder="Enter Email" class="form-input"
                                x-model="form2.email" />
                            <template x-if="isSubmitForm2 && form2.email && emailValidate(form2.email)">
                                <p class="text-[#1abc9c] mt-1">Looks Good!</p>
                            </template>
                            <template x-if="isSubmitForm2 && !(form2.email && emailValidate(form2.email))">
                                <p class="text-danger mt-1">Please fill the Email</p>
                            </template>
                        </div>
                        <button type="submit" class="btn btn-primary !mt-6">Submit Form</button>
                    </form>
                </div>
                <template x-if="codeArr.includes('code2')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- email --&gt;
    &lt;div x-data=&quot;form&quot;&gt;
        &lt;form class=&quot;space-y-5&quot; @submit.prevent=&quot;submitForm2()&quot;&gt;
            &lt;div :class=&quot;[isSubmitForm2 ? (form2.email &amp;&amp; emailValidate(form2.email)  ? 'has-success' : 'has-error') : '']&quot;&gt;
                &lt;label for=&quot;Email&quot;&gt;Email&lt;/label&gt;
                &lt;input id=&quot;Email&quot; type=&quot;text&quot; placeholder=&quot;Enter Email&quot; class=&quot;form-input&quot; x-model=&quot;form2.email&quot; /&gt;
                &lt;template x-if=&quot;isSubmitForm2 &amp;&amp; form2.email &amp;&amp; emailValidate(form2.email)&quot;&gt;
                    &lt;p class=&quot;text-[#1abc9c] mt-1&quot;&gt;Looks Good!&lt;/p&gt;
                &lt;/template&gt;
                &lt;template x-if=&quot;isSubmitForm2 &amp;&amp; !(form2.email &amp;&amp; emailValidate(form2.email))&quot;&gt;
                    &lt;p class=&quot;text-danger mt-1&quot;&gt;Please fill the Email&lt;/p&gt;
                &lt;/template&gt;
            &lt;/div&gt;
            &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary !mt-6&quot;&gt;Submit Form&lt;/button&gt;
        &lt;/form&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;form&quot;, () =&gt; ({
                form2: {
                    email: ''
                },
                isSubmitForm2: false,
                emailValidate(email) {
                    const regexp = /^[\w.%+-]+@[\w.-]+\.[\w]{2,6}$/;
                    return regexp.test(email);
                },
                submitForm2() {
                    this.isSubmitForm2 = true;
                    if (this.emailValidate(this.form2.email)) {
                        //form validated success
                        this.showMessage('Form submitted successfully.');
                    }
                },
                showMessage(msg = '', type = 'success') {
                    const toast = window.Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    toast.fire({
                        icon: type,
                        title: msg,
                        padding: '10px 20px'
                    });
                },
            }));
        });
    &lt;/script&gt;
    </pre>
                </template>
            </div>
            <!-- Select -->
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Select</h5>
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
                    <form class="space-y-5" @submit.prevent="submitForm3()">
                        <div :class="[isSubmitForm3 ? (form3.select ? 'has-success' : 'has-error') : '']">
                            <select class="form-select text-white-dark" x-model="form3.select">
                                <option value="">Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <template x-if="isSubmitForm3 && form3.select">
                                <p class="text-[#1abc9c] mt-1">Example valid custom select feedback</p>
                            </template>
                            <template x-if="isSubmitForm3 && !form3.select">
                                <p class="text-danger mt-1">Please Select the field</p>
                            </template>
                        </div>
                        <button type="submit" class="btn btn-primary !mt-6">Submit Form</button>
                    </form>
                </div>
                <template x-if="codeArr.includes('code3')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- select --&gt;
    &lt;div x-data=&quot;form&quot;&gt;
        &lt;form class=&quot;space-y-5&quot; @submit.prevent=&quot;submitForm3()&quot;&gt;
            &lt;div :class=&quot;[isSubmitForm3 ? (form3.select ? 'has-success' : 'has-error') : '']&quot;&gt;
                &lt;select class=&quot;form-select text-white-dark&quot; x-model=&quot;form3.select&quot;&gt;
                    &lt;option&gt;Open this select menu&lt;/option&gt;
                    &lt;option&gt;One&lt;/option&gt;
                    &lt;option&gt;Two&lt;/option&gt;
                    &lt;option&gt;Three&lt;/option&gt;
                &lt;/select&gt;
                &lt;template x-if=&quot;isSubmitForm3 &amp;&amp; form3.select&quot;&gt;
                    &lt;p class=&quot;text-[#1abc9c] mt-1&quot;&gt;Example valid custom select feedback&lt;/p&gt;
                &lt;/template&gt;
                &lt;template x-if=&quot;isSubmitForm3 &amp;&amp; !form3.select&quot;&gt;
                    &lt;p class=&quot;text-danger mt-1&quot;&gt;Please Select the field&lt;/p&gt;
                &lt;/template&gt;
            &lt;/div&gt;
            &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary !mt-6&quot;&gt;Submit Form&lt;/button&gt;
        &lt;/form&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
     document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;form&quot;, () =&gt; ({
                form3: {
                    select: ''
                },
                isSubmitForm3: false,
                submitForm3() {
                    this.isSubmitForm3 = true;
                    if (this.form3.select) {
                        //form validated success
                        this.showMessage('Form submitted successfully.');
                    }
                },
                showMessage(msg = '', type = 'success') {
                    const toast = window.Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    toast.fire({
                        icon: type,
                        title: msg,
                        padding: '10px 20px'
                    });
                },
            }));
        });
    &lt;/script&gt;
    </pre>
                </template>
            </div>
            <!-- Custom Styles -->
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Custom Styles</h5>
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
                <div class="mb-5">
                    <form class="space-y-5" @submit.prevent="submitForm4()">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <div :class="[isSubmitForm4 ? (form4.firstName ? 'has-success' : 'has-error') : '']">
                                <label for="customFname">First Name</label>
                                <input id="customFname" type="text" placeholder="Enter First Name"
                                    class="form-input" x-model="form4.firstName" />
                                <template x-if="isSubmitForm4 && form4.firstName">
                                    <p class="text-[#1abc9c] mt-1">Looks Good!</p>
                                </template>
                                <template x-if="isSubmitForm4 && !form4.firstName">
                                    <p class="text-danger mt-1">Please fill the first name</p>
                                </template>
                            </div>
                            <div :class="[isSubmitForm4 ? (form4.lastName ? 'has-success' : 'has-error') : '']">
                                <label for="customLname">Last name</label>
                                <input id="customLname" type="text" placeholder="Enter Last Name"
                                    class="form-input" x-model="form4.lastName" />
                                <template x-if="isSubmitForm4 && form4.lastName">
                                    <p class="text-[#1abc9c] mt-1">Looks Good!</p>
                                </template>
                                <template x-if="isSubmitForm4 && !form4.lastName">
                                    <p class="text-danger mt-1">Please fill the last name</p>
                                </template>
                            </div>
                            <div :class="[isSubmitForm4 ? (form4.userName ? 'has-success' : 'has-error') : '']">
                                <label for="customeEmail">Username</label>
                                <div class="flex">
                                    <div
                                        class="bg-[#eee] flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border ltr:border-r-0 rtl:border-l-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                        @</div>
                                    <input id="customeEmail" type="text" placeholder="Enter Username"
                                        class="form-input ltr:rounded-l-none rtl:rounded-r-none"
                                        x-model="form4.userName" />
                                </div>
                                <template x-if="isSubmitForm4 && form4.userName">
                                    <p class="text-[#1abc9c] mt-1">Looks Good!</p>
                                </template>
                                <template x-if="isSubmitForm4 && !form4.userName">
                                    <p class="text-danger mt-1">Please choose a userName</p>
                                </template>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                            <div class="md:col-span-2"
                                :class="[isSubmitForm4 ? (form4.city ? 'has-success' : 'has-error') : '']">
                                <label for="customeCity">City</label>
                                <input id="customeCity" type="text" placeholder="Enter City" class="form-input"
                                    x-model="form4.city" />
                                <template x-if="isSubmitForm4 && form4.city">
                                    <p class="text-[#1abc9c] mt-1">Looks Good!</p>
                                </template>
                                <template x-if="isSubmitForm4 && !form4.city">
                                    <p class="text-danger mt-1">Please provide a valid city</p>
                                </template>
                            </div>
                            <div :class="[isSubmitForm4 ? (form4.state ? 'has-success' : 'has-error') : '']">
                                <label for="customeState">State</label>
                                <input id="customeState" type="text" placeholder="Enter State" class="form-input"
                                    x-model="form4.state" />
                                <template x-if="isSubmitForm4 && form4.state">
                                    <p class="text-[#1abc9c] mt-1">Looks Good!</p>
                                </template>
                                <template x-if="isSubmitForm4 && !form4.state">
                                    <p class="text-danger mt-1">Please provide a valid state</p>
                                </template>
                            </div>
                            <div :class="[isSubmitForm4 ? (form4.zip ? 'has-success' : 'has-error') : '']">
                                <label for="customeZip">Zip</label>
                                <input id="customeZip" type="text" placeholder="Enter Zip" class="form-input"
                                    x-model="form4.zip" />
                                <template x-if="isSubmitForm4 && form4.zip">
                                    <p class="text-[#1abc9c] mt-1">Looks Good!</p>
                                </template>
                                <template x-if="isSubmitForm4 && !form4.zip">
                                    <p class="text-danger mt-1">Please provide a valid zip</p>
                                </template>
                            </div>
                        </div>
                        <div :class="[isSubmitForm4 ? (form4.isTerms ? 'has-success' : 'has-error') : '']">
                            <label class="inline-flex cursor-pointer mt-1">
                                <input type="checkbox" class="form-checkbox" x-model="form4.isTerms" />
                                <span class="text-white-dark">Agree to terms and conditions</span>
                            </label>
                            <template x-if="isSubmitForm4 && !form4.isTerms">
                                <p class="text-danger mt-1">You must agree before submitting.</p>
                            </template>
                        </div>
                        <button type="submit" class="btn btn-primary !mt-6">Submit Form</button>
                    </form>
                </div>
                <template x-if="codeArr.includes('code4')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- custom styles --&gt;
    &lt;form class=&quot;space-y-5&quot; @submit.prevent=&quot;submitForm4()&quot;&gt;
        &lt;div class=&quot;grid grid-cols-1 md:grid-cols-3 gap-5&quot;&gt;
            &lt;div :class=&quot;[isSubmitForm4 ? (form4.firstName ? 'has-success' : 'has-error') : '']&quot;&gt;
                &lt;label for=&quot;customFname&quot;&gt;First Name&lt;/label&gt;
                &lt;input id=&quot;customFname&quot; type=&quot;text&quot; placeholder=&quot;Enter First Name&quot; class=&quot;form-input&quot; x-model=&quot;form4.firstName&quot; /&gt;
                &lt;template x-if=&quot;isSubmitForm4 &amp;&amp; form4.firstName&quot;&gt;
                    &lt;p class=&quot;text-[#1abc9c] mt-1&quot;&gt;Looks Good!&lt;/p&gt;
                &lt;/template&gt;
                &lt;template x-if=&quot;isSubmitForm4 &amp;&amp; !form4.firstName&quot;&gt;
                    &lt;p class=&quot;text-danger mt-1&quot;&gt;Please fill the first name&lt;/p&gt;
                &lt;/template&gt;
            &lt;/div&gt;
            &lt;div :class=&quot;[isSubmitForm4 ? (form4.lastName ? 'has-success' : 'has-error') : '']&quot;&gt;
                &lt;label for=&quot;customLname&quot;&gt;Last name&lt;/label&gt;
                &lt;input id=&quot;customLname&quot; type=&quot;text&quot; placeholder=&quot;Enter Last Name&quot; class=&quot;form-input&quot; x-model=&quot;form4.lastName&quot; /&gt;
                &lt;template x-if=&quot;isSubmitForm4 &amp;&amp; form4.lastName&quot;&gt;
                    &lt;p class=&quot;text-[#1abc9c] mt-1&quot;&gt;Looks Good!&lt;/p&gt;
                &lt;/template&gt;
                &lt;template x-if=&quot;isSubmitForm4 &amp;&amp; !form4.lastName&quot;&gt;
                    &lt;p class=&quot;text-danger mt-1&quot;&gt;Please fill the last name&lt;/p&gt;
                &lt;/template&gt;
            &lt;/div&gt;
            &lt;div :class=&quot;[isSubmitForm4 ? (form4.userName ? 'has-success' : 'has-error') : '']&quot;&gt;
                &lt;label for=&quot;customeEmail&quot;&gt;Username&lt;/label&gt;
                &lt;div class=&quot;flex&quot;&gt;
                    &lt;div class=&quot;bg-[#eee] flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border ltr:border-r-0 rtl:border-l-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]&quot;&gt;@&lt;/div&gt;
                    &lt;input id=&quot;customeEmail&quot; type=&quot;text&quot; placeholder=&quot;Enter Username&quot; class=&quot;form-input ltr:rounded-l-none rtl:rounded-r-none&quot; x-model=&quot;form4.userName&quot; /&gt;
                &lt;/div&gt;
                &lt;template x-if=&quot;isSubmitForm4 &amp;&amp; form4.userName&quot;&gt;
                    &lt;p class=&quot;text-[#1abc9c] mt-1&quot;&gt;Looks Good!&lt;/p&gt;
                &lt;/template&gt;
                &lt;template x-if=&quot;isSubmitForm4 &amp;&amp; !form4.userName&quot;&gt;
                    &lt;p class=&quot;text-danger mt-1&quot;&gt;Please choose a userName&lt;/p&gt;
                &lt;/template&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;grid grid-cols-1 md:grid-cols-4 gap-5&quot;&gt;
            &lt;div class=&quot;md:col-span-2&quot; :class=&quot;[isSubmitForm4 ? (form4.city ? 'has-success' : 'has-error') : '']&quot;&gt;
                &lt;label for=&quot;customeCity&quot;&gt;City&lt;/label&gt;
                &lt;input id=&quot;customeCity&quot; type=&quot;text&quot; placeholder=&quot;Enter City&quot; class=&quot;form-input&quot; x-model=&quot;form4.city&quot; /&gt;
                &lt;template x-if=&quot;isSubmitForm4 &amp;&amp; form4.city&quot;&gt;
                    &lt;p class=&quot;text-[#1abc9c] mt-1&quot;&gt;Looks Good!&lt;/p&gt;
                &lt;/template&gt;
                &lt;template x-if=&quot;isSubmitForm4 &amp;&amp; !form4.city&quot;&gt;
                    &lt;p class=&quot;text-danger mt-1&quot;&gt;Please provide a valid city&lt;/p&gt;
                &lt;/template&gt;
            &lt;/div&gt;
            &lt;div :class=&quot;[isSubmitForm4 ? (form4.state ? 'has-success' : 'has-error') : '']&quot;&gt;
                &lt;label for=&quot;customeState&quot;&gt;State&lt;/label&gt;
                &lt;input id=&quot;customeState&quot; type=&quot;text&quot; placeholder=&quot;Enter State&quot; class=&quot;form-input&quot; x-model=&quot;form4.state&quot; /&gt;
                &lt;template x-if=&quot;isSubmitForm4 &amp;&amp; form4.state&quot;&gt;
                    &lt;p class=&quot;text-[#1abc9c] mt-1&quot;&gt;Looks Good!&lt;/p&gt;
                &lt;/template&gt;
                &lt;template x-if=&quot;isSubmitForm4 &amp;&amp; !form4.state&quot;&gt;
                    &lt;p class=&quot;text-danger mt-1&quot;&gt;Please provide a valid state&lt;/p&gt;
                &lt;/template&gt;
            &lt;/div&gt;
            &lt;div :class=&quot;[isSubmitForm4 ? (form4.zip ? 'has-success' : 'has-error') : '']&quot;&gt;
                &lt;label for=&quot;customeZip&quot;&gt;Zip&lt;/label&gt;
                &lt;input id=&quot;customeZip&quot; type=&quot;text&quot; placeholder=&quot;Enter Zip&quot; class=&quot;form-input&quot; x-model=&quot;form4.zip&quot; /&gt;
                &lt;template x-if=&quot;isSubmitForm4 &amp;&amp; form4.zip&quot;&gt;
                    &lt;p class=&quot;text-[#1abc9c] mt-1&quot;&gt;Looks Good!&lt;/p&gt;
                &lt;/template&gt;
                &lt;template x-if=&quot;isSubmitForm4 &amp;&amp; !form4.zip&quot;&gt;
                    &lt;p class=&quot;text-danger mt-1&quot;&gt;Please provide a valid zip&lt;/p&gt;
                &lt;/template&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div :class=&quot;[isSubmitForm4 ? (form4.isTerms ? 'has-success' : 'has-error') : '']&quot;&gt;
            &lt;label class=&quot;inline-flex cursor-pointer mt-1&quot;&gt;
                &lt;input type=&quot;checkbox&quot; class=&quot;form-checkbox&quot; x-model=&quot;form4.isTerms&quot; /&gt;
                &lt;span class=&quot;text-white-dark"  &quot;&gt;Agree to terms and conditions&lt;/span&gt;
            &lt;/label&gt;
            &lt;template x-if=&quot;isSubmitForm4 &amp;&amp; !form4.isTerms&quot;&gt;
                &lt;p class=&quot;text-danger mt-1&quot;&gt;You must agree before submitting.&lt;/p&gt;
            &lt;/template&gt;
        &lt;/div&gt;
        &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary !mt-6&quot;&gt;Submit Form&lt;/button&gt;
    &lt;/form&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
     document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;form&quot;, () =&gt; ({
                form4: {
                    firstName: 'Shaun',
                    lastName: 'Park',
                    userName: '',
                    city: '',
                    state: '',
                    zip: '',
                    isTerms: false
                },
                isSubmitForm4: false,
                submitForm4() {
                    this.isSubmitForm4 = true;
                    if (this.form4.firstName &amp;&amp; this.form4.lastName &amp;&amp; this.form4.userName &amp;&amp; this.form4.city &amp;&amp; this.form4.state &amp;&amp; this.form4.zip &amp;&amp; this.form4.isTerms) {
                        //form validated success
                        this.showMessage('Form submitted successfully.');
                    }
                },
                showMessage(msg = '', type = 'success') {
                    const toast = window.Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    toast.fire({
                        icon: type,
                        title: msg,
                        padding: '10px 20px'
                    });
                },
            }));
        });
    &lt;/script&gt;
    </pre>
                </template>
            </div>
            <!-- Browser Default -->
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Browser Default</h5>
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
                    <form class="space-y-5" @submit.prevent="submitForm5()">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <div>
                                <label for="browserFname">First Name</label>
                                <input id="browserFname" type="text" placeholder="Enter First Name"
                                    x-model="form5.firstName" class="form-input" required />
                            </div>
                            <div>
                                <label for="browserLname">Last name</label>
                                <input id="browserLname" type="text" placeholder="Enter Last name"
                                    x-model="form5.lastName" class="form-input" required />
                            </div>
                            <div>
                                <label for="browserEmail">Username</label>
                                <div class="flex">
                                    <div
                                        class="bg-[#eee] flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border ltr:border-r-0 rtl:border-l-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                        @</div>
                                    <input id="browserEmail" type="text" placeholder="Enter Username"
                                        x-model="form5.userName"
                                        class="form-input ltr:rounded-l-none rtl:rounded-r-none" required />
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                            <div class="md:col-span-2">
                                <label for="browserCity">City</label>
                                <input id="browserCity" type="text" placeholder="Enter City" x-model="form5.city"
                                    class="form-input" required />
                            </div>
                            <div>
                                <label for="browserState">State</label>
                                <input id="browserState" type="text" placeholder="Enter State"
                                    x-model="form5.state" class="form-input" required />
                            </div>
                            <div>
                                <label for="browserZip">Zip</label>
                                <input id="browserZip" type="text" placeholder="Enter Zip" x-model="form5.zip"
                                    class="form-input" required />
                            </div>
                        </div>
                        <div>
                            <label class="flex items-center cursor-pointer mt-1">
                                <input type="checkbox" class="form-checkbox" x-model="form5.isTerms" require />
                                <span class="text-white-dark">Agree to terms and conditions</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary !mt-6">Submit Form</button>
                    </form>
                </div>
                <template x-if="codeArr.includes('code5')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- browser default --&gt;
    &lt;div x-data=&quot;form&quot;&gt;
        &lt;form class=&quot;space-y-5&quot; @submit.prevent=&quot;submitForm5()&quot;&gt;
            &lt;div class=&quot;grid grid-cols-1 md:grid-cols-3 gap-5&quot;&gt;
                &lt;div&gt;
                    &lt;label for=&quot;browserFname&quot;&gt;First Name&lt;/label&gt;
                    &lt;input id=&quot;browserFname&quot; type=&quot;text&quot; placeholder=&quot;Enter First Name&quot; x-model=&quot;form5.firstName&quot; class=&quot;form-input&quot; required /&gt;
                &lt;/div&gt;
                &lt;div&gt;
                    &lt;label for=&quot;browserLname&quot;&gt;Last name&lt;/label&gt;
                    &lt;input id=&quot;browserLname&quot; type=&quot;text&quot; placeholder=&quot;Enter Last name&quot; x-model=&quot;form5.lastName&quot; class=&quot;form-input&quot; required /&gt;
                &lt;/div&gt;
                &lt;div&gt;
                    &lt;label for=&quot;browserEmail&quot;&gt;Username&lt;/label&gt;
                    &lt;div class=&quot;flex&quot;&gt;
                        &lt;div class=&quot;bg-[#eee] flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border ltr:border-r-0 rtl:border-l-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]&quot;&gt;@&lt;/div&gt;
                        &lt;input id=&quot;browserEmail&quot; type=&quot;text&quot; placeholder=&quot;Enter Username&quot; x-model=&quot;form5.userName&quot; class=&quot;form-input ltr:rounded-l-none rtl:rounded-r-none&quot; required /&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;grid grid-cols-1 md:grid-cols-4 gap-5&quot;&gt;
                &lt;div class=&quot;md:col-span-2&quot;&gt;
                    &lt;label for=&quot;browserCity&quot;&gt;City&lt;/label&gt;
                    &lt;input id=&quot;browserCity&quot; type=&quot;text&quot; placeholder=&quot;Enter City&quot; x-model=&quot;form5.city&quot; class=&quot;form-input&quot; required /&gt;
                &lt;/div&gt;
                &lt;div&gt;
                    &lt;label for=&quot;browserState&quot;&gt;State&lt;/label&gt;
                    &lt;input id=&quot;browserState&quot; type=&quot;text&quot; placeholder=&quot;Enter State&quot; x-model=&quot;form5.state&quot; class=&quot;form-input&quot; required /&gt;
                &lt;/div&gt;
                &lt;div&gt;
                    &lt;label for=&quot;browserZip&quot;&gt;Zip&lt;/label&gt;
                    &lt;input id=&quot;browserZip&quot; type=&quot;text&quot; placeholder=&quot;Enter Zip&quot; x-model=&quot;form5.zip&quot; class=&quot;form-input&quot; required /&gt;
                &lt;/div&gt;
            &lt;/div&gt;
            &lt;div&gt;
                &lt;label class=&quot;flex items-center cursor-pointer mt-1&quot;&gt;
                    &lt;input type=&quot;checkbox&quot; class=&quot;form-checkbox&quot; x-model=&quot;form5.isTerms&quot; require /&gt;
                    &lt;span class=&quot;text-white-dark"&quot;&gt;Agree to terms and conditions&lt;/span&gt;
                &lt;/label&gt;
            &lt;/div&gt;
            &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary !mt-6&quot;&gt;Submit Form&lt;/button&gt;
        &lt;/form&gt;
    &lt;/div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
        document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;form&quot;, () =&gt; ({
                form5: {
                    firstName: 'Shaun',
                    lastName: 'Park',
                    userName: '',
                    city: '',
                    state: '',
                    zip: '',
                    isTerms: false
                },
                isSubmitForm5: false,
                submitForm5() {
                    this.isSubmitForm5 = true;
                    if (this.form5.firstName &amp;&amp; this.form5.lastName &amp;&amp; this.form5.userName &amp;&amp; this.form5.city &amp;&amp; this.form5.state &amp;&amp; this.form5.zip &amp;&amp; this.form5.isTerms) {
                        //form validated success
                        this.showMessage('Form submitted successfully.');
                    }
                },
                showMessage(msg = '', type = 'success') {
                    const toast = window.Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    toast.fire({
                        icon: type,
                        title: msg,
                        padding: '10px 20px'
                    });
                },
            }));
        });
    &lt;/script&gt;
    </pre>
                </template>
            </div>
            <!-- Tooltips -->
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Tooltips</h5>
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
                    <form class="space-y-5" @submit.prevent="submitForm6()">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <div :class="[isSubmitForm6 ? (form6.firstName ? 'has-success' : 'has-error') : '']">
                                <label for="tlpFname">First Name</label>
                                <input id="tlpFname" type="text" placeholder="Enter First Name"
                                    class="form-input mb-2" x-model="form6.firstName" />
                                <template x-if="isSubmitForm6 && form6.firstName">
                                    <span class="text-white bg-[#1abc9c] py-1 px-2 rounded">Looks Good!</span>
                                </template>
                                <template x-if="isSubmitForm6 && !form6.firstName">
                                    <span class="text-white bg-danger py-1 px-2 rounded">Please fill the first
                                        Name</span>
                                </template>
                            </div>
                            <div :class="[isSubmitForm6 ? (form6.lastName ? 'has-success' : 'has-error') : '']">
                                <label for="tlpLname">Last name</label>
                                <input id="tlpLname" type="text" placeholder="Enter Last Name"
                                    class="form-input mb-2" x-model="form6.lastName" />
                                <template x-if="isSubmitForm6 && form6.lastName">
                                    <span class="text-white bg-[#1abc9c] py-1 px-2 rounded">Looks Good!</span>
                                </template>
                                <template x-if="isSubmitForm6 && !form6.lastName">
                                    <span class="text-white bg-danger py-1 px-2 rounded">Please fill the last
                                        Name</span>
                                </template>
                            </div>
                            <div :class="[isSubmitForm6 ? (form6.userName ? 'has-success' : 'has-error') : '']">
                                <label for="tlpEmail">Username</label>
                                <div class="flex">
                                    <div
                                        class="bg-[#eee] flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border ltr:border-r-0 rtl:border-l-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                        @</div>
                                    <input id="tlpEmail" type="text" placeholder="Enter Username"
                                        class="form-input ltr:rounded-l-none rtl:rounded-r-none"
                                        x-model="form6.userName" />
                                </div>
                                <div class="mt-2">
                                    <template x-if="isSubmitForm6 && form6.userName">
                                        <span class="text-white bg-[#1abc9c] py-1 px-2 rounded">Looks Good!</span>
                                    </template>
                                    <template x-if="isSubmitForm6 && !form6.userName">
                                        <span class="text-white bg-danger py-1 px-2 rounded">Please choose a
                                            userName.</span>
                                    </template>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                            <div class="md:col-span-2"
                                :class="[isSubmitForm6 ? (form6.city ? 'has-success' : 'has-error') : '']">
                                <label for="tlpCity">City</label>
                                <input id="tlpCity" type="text" placeholder="Enter City"
                                    class="form-input mb-2" x-model="form6.city" />
                                <template x-if="isSubmitForm6 && form6.city">
                                    <span class="text-white bg-[#1abc9c] py-1 px-2 rounded">Looks Good!</span>
                                </template>
                                <template x-if="isSubmitForm6 && !form6.city">
                                    <span class="text-white bg-danger py-1 px-2 rounded">Please provide a valid
                                        city.</span>
                                </template>
                            </div>
                            <div :class="[isSubmitForm6 ? (form6.state ? 'has-success' : 'has-error') : '']">
                                <label for="tlpState">State</label>
                                <input id="tlpState" type="text" placeholder="Enter State"
                                    class="form-input mb-2" x-model="form6.state" />
                                <template x-if="isSubmitForm6 && form6.state">
                                    <span class="text-white bg-[#1abc9c] py-1 px-2 rounded">Looks Good!</span>
                                </template>
                                <template x-if="isSubmitForm6 && !form6.state">
                                    <span class="text-white bg-danger py-1 px-2 rounded">Please provide a valid
                                        state.</span>
                                </template>
                            </div>
                            <div :class="[isSubmitForm6 ? (form6.zip ? 'has-success' : 'has-error') : '']">
                                <label for="tlpZip">Zip</label>
                                <input id="tlpZip" type="text" placeholder="Enter Zip" class="form-input mb-2"
                                    x-model="form6.zip" />
                                <template x-if="isSubmitForm6 && form6.zip">
                                    <span class="text-white bg-[#1abc9c] py-1 px-2 rounded">Looks Good!</span>
                                </template>
                                <template x-if="isSubmitForm6 && !form6.zip">
                                    <span class="text-white bg-danger py-1 px-2 rounded">Please provide a valid
                                        Zip.</span>
                                </template>
                            </div>
                        </div>
                        <div :class="[isSubmitForm6 ? (form6.isTerms ? 'has-success' : 'has-error') : '']">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="form-checkbox" x-model="form6.isTerms" />
                                <span class="text-white-dark">Agree to terms and conditions</span>
                            </label>
                            <template x-if="isSubmitForm6 && !form6.isTerms">
                                <div class="mt-2">
                                    <span class="text-white bg-danger py-1 px-2 rounded">You must agree before
                                        submitting.</span>
                                </div>
                            </template>
                        </div>
                        <button type="submit" class="btn btn-primary !mt-6">Submit Form</button>
                    </form>
                </div>
                <template x-if="codeArr.includes('code6')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- tooltips --&gt;
    &lt;div x-data=&quot;form&quot;&gt;
        &lt;form class=&quot;space-y-5&quot; @submit.prevent=&quot;submitForm6()&quot;&gt;
            &lt;div class=&quot;grid grid-cols-1 md:grid-cols-3 gap-5&quot;&gt;
                &lt;div :class=&quot;[isSubmitForm6 ? (form6.firstName ? 'has-success' : 'has-error') : '']&quot;&gt;
                    &lt;label for=&quot;tlpFname&quot;&gt;First Name&lt;/label&gt;
                    &lt;input id=&quot;tlpFname&quot; type=&quot;text&quot; placeholder=&quot;Enter First Name&quot; class=&quot;form-input mb-2&quot; x-model=&quot;form6.firstName&quot; /&gt;
                    &lt;template x-if=&quot;isSubmitForm6 &amp;&amp; form6.firstName&quot;&gt;
                        &lt;span class=&quot;text-white bg-[#1abc9c] py-1 px-2 rounded&quot;&gt;Looks Good!&lt;/span&gt;
                    &lt;/template&gt;
                    &lt;template x-if=&quot;isSubmitForm6 &amp;&amp; !form6.firstName&quot;&gt;
                        &lt;span class=&quot;text-white bg-danger py-1 px-2 rounded&quot;&gt;Please fill the first Name&lt;/span&gt;
                    &lt;/template&gt;
                &lt;/div&gt;
                &lt;div :class=&quot;[isSubmitForm6 ? (form6.lastName ? 'has-success' : 'has-error') : '']&quot;&gt;
                    &lt;label for=&quot;tlpLname&quot;&gt;Last name&lt;/label&gt;
                    &lt;input id=&quot;tlpLname&quot; type=&quot;text&quot; placeholder=&quot;Enter Last Name&quot; class=&quot;form-input mb-2&quot; x-model=&quot;form6.lastName&quot; /&gt;
                    &lt;template x-if=&quot;isSubmitForm6 &amp;&amp; form6.lastName&quot;&gt;
                        &lt;span class=&quot;text-white bg-[#1abc9c] py-1 px-2 rounded&quot;&gt;Looks Good!&lt;/span&gt;
                    &lt;/template&gt;
                    &lt;template x-if=&quot;isSubmitForm6 &amp;&amp; !form6.lastName&quot;&gt;
                        &lt;span class=&quot;text-white bg-danger py-1 px-2 rounded&quot;&gt;Please fill the last Name&lt;/span&gt;
                    &lt;/template&gt;
                &lt;/div&gt;
                &lt;div :class=&quot;[isSubmitForm6 ? (form6.userName ? 'has-success' : 'has-error') : '']&quot;&gt;
                    &lt;label for=&quot;tlpEmail&quot;&gt;Username&lt;/label&gt;
                    &lt;div class=&quot;flex&quot;&gt;
                        &lt;div class=&quot;bg-[#eee] flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border ltr:border-r-0 rtl:border-l-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]&quot;&gt;@&lt;/div&gt;
                        &lt;input id=&quot;tlpEmail&quot; type=&quot;text&quot; placeholder=&quot;Enter Username&quot; class=&quot;form-input ltr:rounded-l-none rtl:rounded-r-none&quot; x-model=&quot;form6.userName&quot; /&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;mt-2&quot;&gt;
                        &lt;template x-if=&quot;isSubmitForm6 &amp;&amp; form6.userName&quot;&gt;
                            &lt;span class=&quot;text-white bg-[#1abc9c] py-1 px-2 rounded&quot;&gt;Looks Good!&lt;/span&gt;
                        &lt;/template&gt;
                        &lt;template x-if=&quot;isSubmitForm6 &amp;&amp; !form6.userName&quot;&gt;
                            &lt;span class=&quot;text-white bg-danger py-1 px-2 rounded&quot;&gt;Please choose a userName.&lt;/span&gt;
                        &lt;/template&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;grid grid-cols-1 md:grid-cols-4 gap-5&quot;&gt;
                &lt;div class=&quot;md:col-span-2&quot; :class=&quot;[isSubmitForm6 ? (form6.city ? 'has-success' : 'has-error') : '']&quot;&gt;
                    &lt;label for=&quot;tlpCity&quot;&gt;City&lt;/label&gt;
                    &lt;input id=&quot;tlpCity&quot; type=&quot;text&quot; placeholder=&quot;Enter City&quot; class=&quot;form-input mb-2&quot; x-model=&quot;form6.city&quot; /&gt;
                    &lt;template x-if=&quot;isSubmitForm6 &amp;&amp; form6.city&quot;&gt;
                        &lt;span class=&quot;text-white bg-[#1abc9c] py-1 px-2 rounded&quot;&gt;Looks Good!&lt;/span&gt;
                    &lt;/template&gt;
                    &lt;template x-if=&quot;isSubmitForm6 &amp;&amp; !form6.city&quot;&gt;
                        &lt;span class=&quot;text-white bg-danger py-1 px-2 rounded&quot;&gt;Please provide a valid city.&lt;/span&gt;
                    &lt;/template&gt;
                &lt;/div&gt;
                &lt;div :class=&quot;[isSubmitForm6 ? (form6.state ? 'has-success' : 'has-error') : '']&quot;&gt;
                    &lt;label for=&quot;tlpState&quot;&gt;State&lt;/label&gt;
                    &lt;input id=&quot;tlpState&quot; type=&quot;text&quot; placeholder=&quot;Enter State&quot; class=&quot;form-input mb-2&quot; x-model=&quot;form6.state&quot; /&gt;
                    &lt;template x-if=&quot;isSubmitForm6 &amp;&amp; form6.state&quot;&gt;
                        &lt;span class=&quot;text-white bg-[#1abc9c] py-1 px-2 rounded&quot;&gt;Looks Good!&lt;/span&gt;
                    &lt;/template&gt;
                    &lt;template x-if=&quot;isSubmitForm6 &amp;&amp; !form6.state&quot;&gt;
                        &lt;span class=&quot;text-white bg-danger py-1 px-2 rounded&quot;&gt;Please provide a valid state.&lt;/span&gt;
                    &lt;/template&gt;
                &lt;/div&gt;
                &lt;div :class=&quot;[isSubmitForm6 ? (form6.zip ? 'has-success' : 'has-error') : '']&quot;&gt;
                    &lt;label for=&quot;tlpZip&quot;&gt;Zip&lt;/label&gt;
                    &lt;input id=&quot;tlpZip&quot; type=&quot;text&quot; placeholder=&quot;Enter Zip&quot; class=&quot;form-input mb-2&quot; x-model=&quot;form6.zip&quot; /&gt;
                    &lt;template x-if=&quot;isSubmitForm6 &amp;&amp; form6.zip&quot;&gt;
                        &lt;span class=&quot;text-white bg-[#1abc9c] py-1 px-2 rounded&quot;&gt;Looks Good!&lt;/span&gt;
                    &lt;/template&gt;
                    &lt;template x-if=&quot;isSubmitForm6 &amp;&amp; !form6.zip&quot;&gt;
                        &lt;span class=&quot;text-white bg-danger py-1 px-2 rounded&quot;&gt;Please provide a valid Zip.&lt;/span&gt;
                    &lt;/template&gt;
                &lt;/div&gt;
            &lt;/div&gt;
            &lt;div :class=&quot;[isSubmitForm6 ? (form6.isTerms ? 'has-success' : 'has-error') : '']&quot;&gt;
                &lt;label class=&quot;flex items-center cursor-pointer&quot;&gt;
                    &lt;input type=&quot;checkbox&quot; class=&quot;form-checkbox&quot; x-model=&quot;form6.isTerms&quot; /&gt;
                    &lt;span class=&quot;text-white-dark"&quot;&gt;Agree to terms and conditions&lt;/span&gt;
                &lt;/label&gt;
                &lt;template x-if=&quot;isSubmitForm6 &amp;&amp; !form6.isTerms&quot;&gt;
                    &lt;div class=&quot;mt-2&quot;&gt;
                        &lt;span class=&quot;text-white bg-danger py-1 px-2 rounded&quot;&gt;You must agree before submitting.&lt;/span&gt;
                    &lt;/div&gt;
                &lt;/template&gt;
            &lt;/div&gt;
            &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary !mt-6&quot;&gt;Submit Form&lt;/button&gt;
        &lt;/form&gt;
    &lt;div&gt;

    &lt;!-- script --&gt;
    &lt;script&gt;
     document.addEventListener(&quot;alpine:init&quot;, () =&gt; {
            Alpine.data(&quot;form&quot;, () =&gt; ({
                form6: {
                    firstName: 'Shaun',
                    lastName: 'Park',
                    userName: '',
                    city: '',
                    state: '',
                    zip: '',
                    isTerms: false
                },
                isSubmitForm6: false,
                submitForm6() {
                    this.isSubmitForm6 = true;
                    if (this.form6.firstName &amp;&amp; this.form6.lastName &amp;&amp; this.form6.userName &amp;&amp; this.form6.city &amp;&amp; this.form6.state &amp;&amp; this.form6.zip &amp;&amp; this.form6.isTerms) {
                        //form validated success
                        this.showMessage('Form submitted successfully.');
                    }
                },
                showMessage(msg = '', type = 'success') {
                    const toast = window.Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    toast.fire({
                        icon: type,
                        title: msg,
                        padding: '10px 20px'
                    });
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
            Alpine.data("form", () => ({
                form1: {
                    name: ''
                },
                isSubmitForm1: false,
                form2: {
                    email: ''
                },
                isSubmitForm2: false,
                form3: {
                    select: ''
                },
                isSubmitForm3: false,
                form4: {
                    firstName: 'Shaun',
                    lastName: 'Park',
                    userName: '',
                    city: '',
                    state: '',
                    zip: '',
                    isTerms: false
                },
                isSubmitForm4: false,
                form5: {
                    firstName: 'Shaun',
                    lastName: 'Park',
                    userName: '',
                    city: '',
                    state: '',
                    zip: '',
                    isTerms: false
                },
                isSubmitForm5: false,
                form6: {
                    firstName: 'Shaun',
                    lastName: 'Park',
                    userName: '',
                    city: '',
                    state: '',
                    zip: '',
                    isTerms: false
                },
                isSubmitForm6: false,

                emailValidate(email) {
                    const regexp = /^[\w.%+-]+@[\w.-]+\.[\w]{2,6}$/;
                    return regexp.test(email);
                },
                submitForm1() {
                    this.isSubmitForm1 = true;
                    if (this.form1.name) {
                        //form validated success
                        this.showMessage('Form submitted successfully.');
                    }
                },
                submitForm2() {
                    this.isSubmitForm2 = true;
                    if (this.emailValidate(this.form2.email)) {
                        //form validated success
                        this.showMessage('Form submitted successfully.');
                    }
                },
                submitForm3() {
                    this.isSubmitForm3 = true;
                    if (this.form3.select) {
                        //form validated success
                        this.showMessage('Form submitted successfully.');
                    }
                },
                submitForm4() {
                    this.isSubmitForm4 = true;
                    if (this.form4.firstName && this.form4.lastName && this.form4.userName && this.form4
                        .city && this.form4.state && this.form4.zip && this.form4.isTerms) {
                        //form validated success
                        this.showMessage('Form submitted successfully.');
                    }
                },
                submitForm5() {
                    this.isSubmitForm5 = true;
                    if (this.form5.firstName && this.form5.lastName && this.form5.userName && this.form5
                        .city && this.form5.state && this.form5.zip && this.form5.isTerms) {
                        //form validated success
                        this.showMessage('Form submitted successfully.');
                    }
                },
                submitForm6() {
                    this.isSubmitForm6 = true;
                    if (this.form6.firstName && this.form6.lastName && this.form6.userName && this.form6
                        .city && this.form6.state && this.form6.zip && this.form6.isTerms) {
                        //form validated success
                        this.showMessage('Form submitted successfully.');
                    }
                },

                showMessage(msg = '', type = 'success') {
                    const toast = window.Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    toast.fire({
                        icon: type,
                        title: msg,
                        padding: '10px 20px'
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
