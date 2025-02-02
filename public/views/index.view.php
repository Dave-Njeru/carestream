<?php
$header = "Home";

require 'partials/head.php';

?>

<div class="md:container mx-auto mt-4"><!--content wrapper-->
    <div class="flex justify-between items-center">
        <div><!--header-->
            <h2 class="uppercase text-3xl font-bold fav-color">carestream</h2>
        </div>

        <div class="basis-1/2"><!--navigation links-->
            <nav>
                <ul class="flex justify-evenly">
                    <li class="hover-nav-links"><a href="<?= BASE_URL ?>">Home</a></li>
                    <li class="hover-nav-links"><a href="#">About</a></li>
                    <li class="hover-nav-links"><a href="#">Services</a></li>
                    <li class="hover-nav-links"><a href="#">Contact Us</a></li>
                </ul>
            </nav>
        </div>

        <div><!--buttons-->
            <a href='<?= BASE_URL ?>/login'>
                <button class="mx-4 btn hover:text-white hover:bg-rose-500 transition ease-out duration-500">login</button>
            </a>

            <a href="<?= BASE_URL ?>/register">
                <button class="mx-4 btn hover:text-white hover:bg-rose-500 transition ease-out duration-500">sign up</button>
            </a>
        </div>
    </div>

    <main>
        <div class="mt-3 relative"><!--banner-->
            <img src="<?= BASE_URL ?>/views/img/img1.jpg" alt="patients banner" class="w-full">
            <div class="absolute top-0 ml-8 mt-6">
                <h1 class="text-white text-8xl font-bold">CareStream.</h1>
                <h2 class="text-white text-5xl mt-3">Dedicated to Providing the Best Health Care</h2>
            </div>
        </div>

        <div class="mx-7 mt-4 pb-2 border-b-2 border-gray-300"><!--business-->
            <h1 class="text-5xl text-gray-400">Providing You With Quality Health Care</h1>
            <p class="mt-4">
                Es ist ein lang erwiesener Fakt, dass ein Leser vom Text abgelenkt wird,
                wenn er sich ein Layout ansieht. Der Punkt, Lorem Ipsum zu nutzen, ist,
                dass es mehr oder weniger die normale Anordnung von Buchstaben darstellt und
                somit nach lesbarer Sprache aussieht. Viele Desktop Publisher und Webeditoren
                nutzen mittlerweile Lorem Ipsum als den Standardtext, auch die Suche im Internet nach
                "lorem ipsum" macht viele Webseiten sichtbar, wo diese noch immer vorkommen.
                Mittlerweile gibt es mehrere Versionen des Lorem Ipsum, einige zufällig,
                andere bewusst beeinflusst von Witz und des eigenen Geschmack
            </p>
            <p class="mt-4">
                Es ist ein lang erwiesener Fakt, dass ein Leser vom Text abgelenkt wird,
                wenn er sich ein Layout ansieht. Der Punkt, Lorem Ipsum zu nutzen, ist,
                dass es mehr oder weniger die normale Anordnung von Buchstaben darstellt und
                somit nach lesbarer Sprache aussieht. Viele Desktop Publisher und Webeditoren
                nutzen mittlerweile Lorem Ipsum als den Standardtext, auch die Suche im Internet nach
                "lorem ipsum" macht viele Webseiten sichtbar, wo diese noch immer vorkommen.
                Mittlerweile gibt es mehrere Versionen des Lorem Ipsum, einige zufällig,
                andere bewusst beeinflusst von Witz und des eigenen Geschmack
            </p>
        </div>
    </main>

    <footer class="mx-7 my-8 flex justify-evenly"><!--footer-->
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 inline-block mr-3">
                <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" />
            </svg>
            <span>Call us on +254-000-000-000</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 inline-block mr-3">
                <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
            </svg>

            <span>Email: info@carestream.com</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 inline-block mr-3">
                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
            </svg>
            <span><a href="#">More Info>></a></span>
        </div>
    </footer>
</div>