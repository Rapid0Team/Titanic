<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="../css/nav.css">
<div class="nav sm:w-full w-full p-2 bg-black text-white flex fixed justify-between items-center top-0 z-10">
    <a href="home.php"><img src="../image/logo.jpg" alt="logo" class="w-32 rounded-3xl h-16"></a>
    <ul class="hidden md:flex gap-7 about text-xl">
        <li><a href="home.php" >Acceuil</a></li>
        <li><a href="home.php#Contact" >Contactez Nous</a></li>
        <li><a href="about.php" >A propos</a></li>
        <li><a href="Catalogue.php">Catalogue</a></li>
    </ul>
    <div class="hidden md:flex items-center space-x-2">
        <button class="bg-slate-800 text-white rounded-full px-4 py-1 hover:bg-slate-700">
            <a href="sign-up.php">Sign up</a>
        </button>
        <button class="bg-slate-800 text-white rounded-full px-4 py-1 hover:bg-slate-700">
            <a href="login.php">Log in</a>
        </button>
    </div>
    <div class="md:hidden cursor-pointer" onclick="showSide()">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
            <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/>
        </svg>
    </div>
</div>

<div class="sidebar py-52">
    <div class="">

        <img src="../image/logo.jpg" alt="logo" class="w-56 dnone rounded-3xl h-32">
    </div>
    <ul class="pt-4 grid place text-white w-full">
        <li class="pl-5 absolute top-0 right-0" onclick="hideSide()">
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#e8eaed">
                    <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/>
                </svg>
            </a>
        </li>
        
        <li class="mt-4 w-full p-3 rounded-lg  text-xl text-center hover:bg-gray-600"><a href="home.php">Acceuil</a></li>
        <li class="mt-4 w-full p-3 rounded-lg  text-xl text-center hover:bg-gray-600"><a href="home.php#Contact">Contactez Nous</a></li>
        <li class="mt-4 p-3 rounded-lg  text-xl hover:bg-gray-600"><a class="w-full" href="about.php">A propos</a></li>
        <li class="mt-4 p-3 rounded-lg  text-xl hover:bg-gray-600"><a href="Catalogue.php">Catalogue</a></li>
        <div class=" botn  absolute bottom-0 ml-4 sup">
        <li class="mt-6 pl-5 pr-5 pt-2 pb-2 rounded-full text-xl border-white border-2 hover:text-black hover:bg-gray-300"><a class="text-2xl font-bold" href="sign-up.php">Sign up</a></li>
        <li class="mt-4 text-xl pl-5 pr-5 pt-2 pb-2 rounded-full border-white bg-white text-black  border-2 hover:bg-black hover:text-white"><a href="login.php" class="text-2xl font-bold">Sign up</a></li>
    
        </div>
        </ul>
</div>

<script>
    function showSide(){
        let sidebar = document.querySelector('.sidebar')
        sidebar.style.display="flex"
    }
    function hideSide(){
        let sidebar = document.querySelector('.sidebar')
        sidebar.style.display="none"
    }
</script>