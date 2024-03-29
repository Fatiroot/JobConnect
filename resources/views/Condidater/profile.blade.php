<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />

</head>
<body>
<header class="p-4 dark:bg-gray-800 dark:text-gray-100">
	<div class="container flex justify-between h-16 mx-auto">
		<a rel="noopener noreferrer" href="#" aria-label="Back to homepage" class="flex items-center p-2">
			<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 32 32" class="w-8 h-8 dark:text-violet-400">
				<path d="M27.912 7.289l-10.324-5.961c-0.455-0.268-1.002-0.425-1.588-0.425s-1.133 0.158-1.604 0.433l0.015-0.008-10.324 5.961c-0.955 0.561-1.586 1.582-1.588 2.75v11.922c0.002 1.168 0.635 2.189 1.574 2.742l0.016 0.008 10.322 5.961c0.455 0.267 1.004 0.425 1.59 0.425 0.584 0 1.131-0.158 1.602-0.433l-0.014 0.008 10.322-5.961c0.955-0.561 1.586-1.582 1.588-2.75v-11.922c-0.002-1.168-0.633-2.189-1.573-2.742zM27.383 21.961c0 0.389-0.211 0.73-0.526 0.914l-0.004 0.002-10.324 5.961c-0.152 0.088-0.334 0.142-0.53 0.142s-0.377-0.053-0.535-0.145l0.005 0.002-10.324-5.961c-0.319-0.186-0.529-0.527-0.529-0.916v-11.922c0-0.389 0.211-0.73 0.526-0.914l0.004-0.002 10.324-5.961c0.152-0.090 0.334-0.143 0.53-0.143s0.377 0.053 0.535 0.144l-0.006-0.002 10.324 5.961c0.319 0.185 0.529 0.527 0.529 0.916z"></path>
				<path d="M22.094 19.451h-0.758c-0.188 0-0.363 0.049-0.515 0.135l0.006-0.004-4.574 2.512-5.282-3.049v-6.082l5.282-3.051 4.576 2.504c0.146 0.082 0.323 0.131 0.508 0.131h0.758c0.293 0 0.529-0.239 0.529-0.531v-0.716c0-0.2-0.11-0.373-0.271-0.463l-0.004-0.002-5.078-2.777c-0.293-0.164-0.645-0.26-1.015-0.26-0.39 0-0.756 0.106-1.070 0.289l0.010-0.006-5.281 3.049c-0.636 0.375-1.056 1.055-1.059 1.834v6.082c0 0.779 0.422 1.461 1.049 1.828l0.009 0.006 5.281 3.049c0.305 0.178 0.67 0.284 1.061 0.284 0.373 0 0.723-0.098 1.027-0.265l-0.012 0.006 5.080-2.787c0.166-0.091 0.276-0.265 0.276-0.465v-0.716c0-0.293-0.238-0.529-0.529-0.529z"></path>
			</svg>
            <span>JOBCONNECT</span>
		</a>
		<div class="flex items-center md:space-x-4">
			<div class="relative">
				<span class="absolute inset-y-0 left-0 flex items-center pl-2">
					<button type="submit" title="Search" class="p-1 focus:outline-none focus:ring">
						<svg fill="currentColor" viewBox="0 0 512 512" class="w-4 h-4 dark:text-gray-100">
							<path d="M479.6,399.716l-81.084-81.084-62.368-25.767A175.014,175.014,0,0,0,368,192c0-97.047-78.953-176-176-176S16,94.953,16,192,94.953,368,192,368a175.034,175.034,0,0,0,101.619-32.377l25.7,62.2L400.4,478.911a56,56,0,1,0,79.2-79.195ZM48,192c0-79.4,64.6-144,144-144s144,64.6,144,144S271.4,336,192,336,48,271.4,48,192ZM456.971,456.284a24.028,24.028,0,0,1-33.942,0l-76.572-76.572-23.894-57.835L380.4,345.771l76.573,76.572A24.028,24.028,0,0,1,456.971,456.284Z"></path>
						</svg>
					</button>
				</span>
				<input type="search" name="Search" placeholder="Search..." class="w-32 py-2 pl-10 text-sm rounded-md sm:w-auto focus:outline-none dark:bg-gray-800 dark:text-gray-100 focus:dark:bg-gray-900">
			</div>
            @auth
                    <div class="flex items-center lg:order-2">
                        <form method="post" action="{{ route('logout') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            @csrf
                            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="submit">Sign out</button>
                        </form>
                    </div>  
                @else
                <div class="flex items-center lg:order-2">
                 
                    <a href="{{ route('login') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">login</a>
                   
                </div>  
                @endauth
                @auth
                <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="/home" class="block py-2 pl-3 pr-4 text-black hover:text-blue-500  lg:p-0 dark:text-white" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="formations" class="block py-2 pl-3 pr-4 text-black hover:text-blue-500 lg:p-0 dark:text-white" aria-current="page">My Profile</a>
                        </li>
                    </ul>
                </div> 
                @endauth		</div>
		<button title="Open menu" type="button" class="p-4 lg:hidden">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 dark:text-gray-100">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
			</svg>
		</button>
	</div>
</header>
<div class="p-16"><div class="p-8 bg-white shadow mt-24"> 
     <div class="grid grid-cols-1 md:grid-cols-3">  
        <div class="grid grid-cols-3 text-center order-last md:order-first mt-20 md:mt-0">   
            <div>       
                <p class="font-bold text-gray-700 text-xl">22</p>       
                <p class="text-gray-400">Friends</p>    
            </div>      
            <div>       
                <p class="font-bold text-gray-700 text-xl">10</p>
                <p class="text-gray-400">Photos</p>  
            </div>     
                <div>   
                    <p class="font-bold text-gray-700 text-xl">89</p> 
                    <p class="text-gray-400">Comments</p> 
                </div> 
            </div>  
            <div class="relative">
            <div class="w-48 h-48 bg-indigo-100 mx-auto rounded-full absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500">
                <img src="{{ Auth::user()->getFirstMediaUrl('images') }}" alt="User Image">
            </div>
 
            </div>   
            <div class="space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">
                <button  class="text-white py-2 px-4 uppercase rounded bg-blue-400 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">  Connect</button> 
                <button  class="text-white py-2 px-4 uppercase rounded bg-gray-700 hover:bg-gray-800 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">  Message</button>
            </div>
        </div>
        <div class="mt-20 text-center border-b pb-12"> 
            <h1 class="text-4xl font-medium text-gray-700">{{ Auth::user()->name }}</h1> 
            <p class="font-light text-gray-600 mt-3">{{ Auth::user()->email }}</p>    
            <p class="mt-8 text-gray-500">{{ Auth::user()->phone }}</p>  
            <p class="mt-2 text-gray-500">{{ Auth::user()->skill }}</p>  
        </div>  
            <div class="mt-12 flex flex-col justify-center">
            <p class="text-gray-600 text-center font-light lg:px-16">An artist of considerable range, Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. An artist of considerable range.</p>  
        </div>
    </div>
 </div>
 <div class="flex justify-center">
    <a href="{{ route('formations.create')}}" class="btn btn-primary bg-green-500 mt-5 text-white py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:shadow-outline-green active:bg-green-700">
        Add New formation
    </a>
</div>

            

<section class="text-gray-600 body-font overflow-hidden">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap -m-12">
            
       @foreach ($formations as $formation ) 
      <div class="p-12 md:w-1/3 flex flex-col items-start">
        <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">{{$formation->diploma}}</h2>
        <p class="leading-relaxed mb-8">{{$formation->year}}</p>
        
        <a class="inline-flex items-center">
          <img alt="blog" src="https://dummyimage.com/104x104" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
          <span class="flex-grow flex flex-col pl-4">
            <span class="title-font font-medium text-gray-900">school name</span>
            <span class="text-gray-400 text-xs tracking-widest mt-0.5">{{$formation->ecole}}</span>
          </span>
        </a>
        <div class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-gray-100 mt-auto w-full">
        
          <form action="{{ route('formations.destroy', $formation) }}" method="post">
                @method('delete')
                @csrf
                <input type="hidden" name="id" value="{{$formation->id}}">
                <button type="submit" name="destroyId" style="background: none; border: none;">
                 delete</button>
            </form>
        </div>

      </div>
        @endforeach
    </div>
</section>
<div class="flex justify-center">
    <a href="{{ route('experiences.create')}}" class="btn btn-primary bg-green-500 mt-5 text-white py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:shadow-outline-green active:bg-green-700">
        Add New experience
    </a>
</div>
<section class="text-gray-600 body-font overflow-hidden">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap -m-12">
            
       @foreach ($experiences as $experience ) 
      <div class="p-12 md:w-1/3 flex flex-col items-start">
        <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">{{$experience->description}}</h2>
        <p class="leading-relaxed mb-8">{{$experience->duration}}</p>
        
        <a class="inline-flex items-center">
          <img alt="blog" src="https://dummyimage.com/104x104" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
          <span class="flex-grow flex flex-col pl-4">
            <span class="title-font font-medium text-gray-900">company name</span>
            <span class="text-gray-400 text-xs tracking-widest mt-0.5">{{$experience->name_company}}</span>
          </span>
        </a>
        <div class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-gray-100 mt-auto w-full">
       
          <form action="{{ route('experiences.destroy', $experience) }}" method="post">
                @method('delete')
                @csrf
                <input type="hidden" name="id" value="{{$experience->id}}">
                <button type="submit" name="destroyId" style="background: none; border: none;">
                 delete</button>
            </form>
        </div>

      </div>
        @endforeach
    </div>
</section> 


<script>
    function toggleAnswer(event) {
    const answer = event.target.nextElementSibling;
    answer.classList.toggle('hidden');
}
</script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
