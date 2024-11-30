<?php
$header = 'Admin Panel';

require 'partials/head.php'
?>

<div class="md:container mx-auto mt-3 px-4 grid grid-rows-6"> <!--content wrapper-->
    <div class="row-span-1">
        <div class="flex">
            <div class="basis-1/4">
                <p class="uppercase">carestream</p>
            </div>
            <div class="">
                <input type="text">
            </div>
            <div class="">

            </div>
        </div>
    </div>

    <div class="row-span-5">
        <div class="grid grid-cols-6">
            <div class="col-span-1"><!--sidebar-->
                <nav>
                    <ul>
                        <li class="flex justify-between">
                            <span>Doctor</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 ml-2">
                                <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                            </svg>
                        </li>
                        <li class="flex justify-between">
                            <span>Nurse</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 ml-2">
                                <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                            </svg>
                        </li>
                        <li class="flex">
                            <span>Patient</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 ml-2">
                                <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                            </svg>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-span-2"><!--main content-->

            </div>
        </div>
    </div>

</div>