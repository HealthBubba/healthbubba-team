<html lang="en">
	<head>
		<title>Healthbubba - Affiliates - {{$title}}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="HealthBubba - Marketing" />
		<meta property="og:url" content="{{request()->url()}}" />
		<meta property="og:site_name" content="Healthbubba Affiliates" />
		<link rel="canonical" href="{{request()->url()}}" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />

		<link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

		@stack('styles')
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
	</head>

	<body id="kt_body" {{$attributes}}>

		@if (session('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{ session('success') }}
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		@endif


        <script>
            var defaultThemeMode = "light"; 
            var themeMode; 
            
            if ( document.documentElement ) { 
                if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { 
                    themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); 
                } else { 
                    if ( localStorage.getItem("data-bs-theme") !== null ) { 
                        themeMode = localStorage.getItem("data-bs-theme"); 
                    } else { 
                        themeMode = defaultThemeMode; 
                    } 
                } 
                
                if (themeMode === "system") { 
                    themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; 
                } 
                
                document.documentElement.setAttribute("data-bs-theme", themeMode); 
            }
        </script>

        {{$slot}}

		@impersonating()
			<div class="position-fixed d-flex align-items-end justify-content-end p-5 z-50" style="bottom: 0; right: 0;">
				<div class="card">
					<div class="p-5">
						<div class="mb-3">
							<h5 class="mb-0">Currently impersonating</h5>
							<p class="mb-0 text-gray-500">{{$authenticated->full_name}} - {{$authenticated->email}} </p>
						</div>
						<a href="{{route('impersonate.leave')}}" class="btn btn-sm btn-light-primary">End Impersonation</a>
					</div>
				</div>
			</div>
		@endImpersonating

		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="/assets/plugins/global/plugins.bundle.js"></script>
		<script src="/assets/js/scripts.bundle.js"></script>

		@stack('scripts')
		<x-toast />
    </body>
</html>