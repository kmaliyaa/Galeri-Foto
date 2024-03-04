<nav class="py-1 top-0 z-20 bg-white items-center ">
    <div class="flex justify-between max-w-screen-xl p-7 mx-auto items-center">
        <div class="font-fontjudul text-5xl">MG</div>
        <form action="/dasboard" method="GET">
            <input type="text" placeholder="Telusuri" id="" name="cari" class=" px-4 border-2 rounded-full w-[590px] h-[57px] text-2xl">
        </form>
        <div class="flex items-center justify-between gap-8">
            <a href="/dasboard"><span class="text-5xl bi bi-house-fill "></span></a>
            <div class="overflow-hidden">
                                        
                <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" type="button">
                    <span class="sr-only">Open user menu</span>
                    <img src="{{ asset('fotoprofile/'. Auth::user()->avatar) }}" alt="" class="w-20 h-20 border rounded-full">
                    </button>
                    
                    <!-- Dropdown menu -->
                    <div id="dropdownAvatar" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div>
                                <a href="/postingan" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><span class="bi bi-person-fill">  Profil</span></a>
                            </div>
                        </div>
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">
                                <li>
                                    <a href="/uploadfoto" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><span class="bi bi-cloud-arrow-up">  Upload</span></a>
                                </li>
                                <li>
                                    <a href="/album" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><span class="bi bi-card-image">  Album</span></a>
                                </li>
                                <li>
                                    <a href="/ubahpassword" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><span class="bi bi-file-lock2-fill">  Ubah Password</span></a>
                                </li>
                            </ul>
                          <div class="py-2">
                            <a href="/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><span class="bi bi-box-arrow-right">  Logout</span></a>
                          </div>
                    </div>

        </div>
    </div>
 </div>
</nav>
