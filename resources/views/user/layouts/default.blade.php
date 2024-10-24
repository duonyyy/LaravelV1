<!DOCTYPE html>
<html lang="en">

<head>
	<title>Landing Page</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}  " />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
	<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-body position-relative app-blank">
	<div class="d-flex flex-column flex-root" id="kt_app_root">
		<!-- Banner -->
		<div class="mb-0" id="home">
			<div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
				style="background-image: url(assets/media/svg/illustrations/landing.svg)">

				<!-- Header -->
				@include('user.layouts.header')
				<!--end::Header-->



				<!--begin::Landing hero-->
				<div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
					<div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
						<h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15">Build An Outstanding Solutions
							<br />with
							<span
								style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
								<span id="kt_landing_hero_text">The Best Theme Ever</span>
							</span>
						</h1>
					</div>
					<div class="d-flex flex-center flex-wrap position-relative px-5">
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Fujifilm">
							<img src="assets/media/svg/brand-logos/fujifilm.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Vodafone">
							<img src="assets/media/svg/brand-logos/vodafone.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="KPMG International">
							<img src="assets/media/svg/brand-logos/kpmg.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Nasa">
							<img src="assets/media/svg/brand-logos/nasa.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Aspnetzero">
							<img src="assets/media/svg/brand-logos/aspnetzero.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip"
							title="AON - Empower Results">
							<img src="assets/media/svg/brand-logos/aon.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Hewlett-Packard">
							<img src="assets/media/svg/brand-logos/hp-3.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Truman">
							<img src="assets/media/svg/brand-logos/truman.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>
					</div>
				</div>
				<!--end::Landing hero-->
			</div>

			<!-- Curve -->
			<div class="landing-curve landing-dark-color mb-10 mb-lg-20">
				<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
						fill="currentColor"></path>
				</svg>
			</div>
			<!--end::Curve bottom-->
		</div>
		<!-- end::Banner -->


		<!--end::Header Section-->
		<div class="mb-n10 mb-lg-n20 z-index-2">
			<div class="container mb-10">
				<div class="text-center mb-17">
					<h3 class="fs-2hx text-gray-900 mb-5" id="how-it-works"
						data-kt-scroll-offset="{default: 100, lg: 150}">How it Works</h3>
					<div class="fs-5 text-muted fw-bold">Save thousands to millions of bucks by using single tool
						<br />for different amazing and great useful admin
					</div>
				</div>
				<div class="row w-100 gy-10 mb-md-20">
					<div class="col-md-4 px-5">
						<div class="text-center mb-10 mb-md-0">
							<img src="assets/media/illustrations/sketchy-1/2.png" class="mh-125px mb-9" alt="" />
							<div class="d-flex flex-center mb-5">
								<span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">1</span>
								<div class="fs-5 fs-lg-3 fw-bold text-gray-900">Jane Miller</div>
							</div>
							<div class="fw-semibold fs-6 fs-lg-4 text-muted">Save thousands to millions of bucks
								<br />by using single tool for different
								<br />amazing and great
							</div>
						</div>
					</div>
					<div class="col-md-4 px-5">
						<div class="text-center mb-10 mb-md-0">
							<img src="assets/media/illustrations/sketchy-1/8.png" class="mh-125px mb-9" alt="" />
							<div class="d-flex flex-center mb-5">
								<span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">2</span>
								<div class="fs-5 fs-lg-3 fw-bold text-gray-900">Setup Your App</div>
							</div>
							<div class="fw-semibold fs-6 fs-lg-4 text-muted">Save thousands to millions of bucks
								<br />by using single tool for different
								<br />amazing and great
							</div>
						</div>
					</div>
					<div class="col-md-4 px-5">
						<div class="text-center mb-10 mb-md-0">
							<img src="assets/media/illustrations/sketchy-1/12.png" class="mh-125px mb-9" alt="" />
							<div class="d-flex flex-center mb-5">
								<span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">3</span>
								<div class="fs-5 fs-lg-3 fw-bold text-gray-900">Enjoy Nautica App</div>
							</div>
							<div class="fw-semibold fs-6 fs-lg-4 text-muted">Save thousands to millions of bucks
								<br />by using single tool for different
								<br />amazing and great
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end::How It Works Section-->




		<!--begin::Statistics Section-->
		<div class="mt-10">
			<div class="landing-curve landing-dark-color">
				<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
						fill="currentColor"></path>
				</svg>
			</div>
			<div class="pb-15 pt-18 landing-dark-bg">
				<div class="container">
					<div class="text-center mt-15 mb-18" id="achievements"
						data-kt-scroll-offset="{default: 100, lg: 150}">
						<h3 class="fs-2hx text-white fw-bold mb-5">We Make Things Better</h3>
						<div class="fs-5 text-gray-700 fw-bold">Save thousands to millions of bucks by using single tool
							<br />for different amazing and great useful admin
						</div>
					</div>
					<div class="d-flex flex-center">
						<div class="d-flex flex-wrap flex-center justify-content-lg-between mb-15 mx-auto w-xl-900px">
							<div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
								style="background-image: url('assets/media/svg/misc/octagon.svg')">
								<i class="ki-duotone ki-element-11 fs-2tx text-white mb-3">
									<span class="path1"></span>
									<span class="path2"></span>
									<span class="path3"></span>
									<span class="path4"></span>
								</i>
								<div class="mb-0">
									<div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
										<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="700"
											data-kt-countup-suffix="+">0</div>
									</div>
									<span class="text-gray-600 fw-semibold fs-5 lh-0">Known Companies</span>
								</div>
							</div>
							<div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
								style="background-image: url('assets/media/svg/misc/octagon.svg')">
								<i class="ki-duotone ki-chart-pie-4 fs-2tx text-white mb-3">
									<span class="path1"></span>
									<span class="path2"></span>
									<span class="path3"></span>
								</i>
								<div class="mb-0">
									<div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
										<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="80"
											data-kt-countup-suffix="K+">0</div>
									</div>
									<span class="text-gray-600 fw-semibold fs-5 lh-0">Statistic Reports</span>
								</div>
							</div>
							<div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
								style="background-image: url('assets/media/svg/misc/octagon.svg')">
								<i class="ki-duotone ki-basket fs-2tx text-white mb-3">
									<span class="path1"></span>
									<span class="path2"></span>
									<span class="path3"></span>
									<span class="path4"></span>
								</i>
								<div class="mb-0">
									<div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
										<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="35"
											data-kt-countup-suffix="M+">0</div>
									</div>
									<span class="text-gray-600 fw-semibold fs-5 lh-0">Secure Payments</span>
								</div>
							</div>
						</div>
					</div>
					<div class="fs-2 fw-semibold text-muted text-center mb-3">
						<span class="fs-1 lh-1 text-gray-700">“</span>When you care about your topic, you’ll write about
						it in a
						<br />
						<span class="text-gray-700 me-1">more powerful</span>, emotionally expressive way
						<span class="fs-1 lh-1 text-gray-700">“</span>
					</div>
					<div class="fs-2 fw-semibold text-muted text-center">
						<a href="account/security.html" class="link-primary fs-4 fw-bold">Marcus Levy,</a>
						<span class="fs-4 fw-bold text-gray-600">KeenThemes CEO</span>
					</div>
				</div>
			</div>
			<div class="landing-curve landing-dark-color">
				<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
						fill="currentColor"></path>
				</svg>
			</div>
		</div>
		<!--end::Statistics Section-->


		<!--begin::Team Section-->
		<div class="py-10 py-lg-20">
			<div class="container">
				<div class="text-center mb-12">
					<h3 class="fs-2hx text-gray-900 mb-5" id="team" data-kt-scroll-offset="{default: 100, lg: 150}">Our
						Great Team</h3>
					<div class="fs-5 text-muted fw-bold">It’s no doubt that when a development takes longer to complete,
						additional costs to
						<br />integrate and test each extra feature creeps up and haunts most of us.
					</div>
				</div>
				<div class="tns tns-default" style="direction: ltr">
					<div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000"
						data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true"
						data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false"
						data-tns-prev-button="#kt_team_slider_prev" data-tns-next-button="#kt_team_slider_next"
						data-tns-responsive="{1200: {items: 3}, 992: {items: 2}}">
						<div class="text-center">
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
								style="background-image:url('assets/media/avatars/300-1.jpg')"></div>
							<div class="mb-0">
								<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Paul Miles</a>
								<div class="text-muted fs-6 fw-semibold mt-1">Development Lead</div>
							</div>
						</div>
						<div class="text-center">
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
								style="background-image:url('assets/media/avatars/300-2.jpg')"></div>
							<div class="mb-0">
								<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Melisa Marcus</a>
								<div class="text-muted fs-6 fw-semibold mt-1">Creative Director</div>
							</div>
						</div>
						<div class="text-center">
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
								style="background-image:url('assets/media/avatars/300-5.jpg')"></div>
							<div class="mb-0">
								<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">David Nilson</a>
								<div class="text-muted fs-6 fw-semibold mt-1">Python Expert</div>
							</div>
						</div>
						<div class="text-center">
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
								style="background-image:url('assets/media/avatars/300-20.jpg')"></div>
							<div class="mb-0">
								<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Anne Clarc</a>
								<div class="text-muted fs-6 fw-semibold mt-1">Project Manager</div>
							</div>
						</div>
						<div class="text-center">
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
								style="background-image:url('assets/media/avatars/300-23.jpg')"></div>
							<div class="mb-0">
								<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Ricky Hunt</a>
								<div class="text-muted fs-6 fw-semibold mt-1">Art Director</div>
							</div>
						</div>
						<div class="text-center">
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
								style="background-image:url('assets/media/avatars/300-12.jpg')"></div>
							<div class="mb-0">
								<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Alice Wayde</a>
								<div class="text-muted fs-6 fw-semibold mt-1">Marketing Manager</div>
							</div>
						</div>
						<div class="text-center">
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
								style="background-image:url('assets/media/avatars/300-9.jpg')"></div>
							<div class="mb-0">
								<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Carles Puyol</a>
								<div class="text-muted fs-6 fw-semibold mt-1">QA Managers</div>
							</div>
						</div>
					</div>
					<button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev">
						<i class="ki-duotone ki-left fs-2x"></i>
					</button>
					<button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next">
						<i class="ki-duotone ki-right fs-2x"></i>
					</button>
				</div>
			</div>
		</div>
		<!--end::Team Section-->


		<!--begin::Projects Section-->
		<div class="mb-lg-n15 position-relative z-index-2">
			<div class="container">
				<div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
					<div class="card-body p-lg-20">
						<div class="text-center mb-5 mb-lg-10">
							<h3 class="fs-2hx text-gray-900 mb-5" id="portfolio"
								data-kt-scroll-offset="{default: 100, lg: 250}">Our Projects</h3>
						</div>
						<div class="d-flex flex-center mb-5 mb-lg-15">
							<ul class="nav border-transparent flex-center fs-5 fw-bold">
								<li class="nav-item">
									<a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 active" href="#"
										data-bs-toggle="tab" data-bs-target="#kt_landing_projects_latest">Latest</a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#"
										data-bs-toggle="tab" data-bs-target="#kt_landing_projects_web_design">Web
										Design</a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#"
										data-bs-toggle="tab" data-bs-target="#kt_landing_projects_mobile_apps">Mobile
										Apps</a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#"
										data-bs-toggle="tab"
										data-bs-target="#kt_landing_projects_development">Development</a>
								</li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade show active" id="kt_landing_projects_latest">
								<div class="row g-10">
									<div class="col-lg-6">
										<a class="d-block card-rounded overlay h-lg-100"
											data-fslightbox="lightbox-projects"
											href="assets/media/stock/600x600/img-23.jpg">
											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px"
												style="background-image:url('assets/media/stock/600x600/img-23.jpg')">
											</div>
											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-duotone ki-eye fs-3x text-white">
													<span class="path1"></span>
													<span class="path2"></span>
													<span class="path3"></span>
												</i>
											</div>
										</a>
									</div>
									<div class="col-lg-6">
										<div class="row g-10 mb-10">
											<div class="col-lg-6">
												<a class="d-block card-rounded overlay"
													data-fslightbox="lightbox-projects"
													href="assets/media/stock/600x600/img-22.jpg">
													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
														style="background-image:url('assets/media/stock/600x600/img-22.jpg')">
													</div>
													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-duotone ki-eye fs-3x text-white">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</div>
												</a>
											</div>
											<div class="col-lg-6">
												<a class="d-block card-rounded overlay"
													data-fslightbox="lightbox-projects"
													href="assets/media/stock/600x600/img-21.jpg">
													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
														style="background-image:url('assets/media/stock/600x600/img-21.jpg')">
													</div>
													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-duotone ki-eye fs-3x text-white">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</div>
												</a>
											</div>
										</div>
										<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
											href="assets/media/stock/600x400/img-20.jpg">
											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
												style="background-image:url('assets/media/stock/600x600/img-20.jpg')">
											</div>
											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-duotone ki-eye fs-3x text-white">
													<span class="path1"></span>
													<span class="path2"></span>
													<span class="path3"></span>
												</i>
											</div>
										</a>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="kt_landing_projects_web_design">
								<div class="row g-10">
									<div class="col-lg-6">
										<a class="d-block card-rounded overlay h-lg-100"
											data-fslightbox="lightbox-projects"
											href="assets/media/stock/600x600/img-11.jpg">
											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px"
												style="background-image:url('assets/media/stock/600x600/img-11.jpg')">
											</div>
											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-duotone ki-eye fs-3x text-white">
													<span class="path1"></span>
													<span class="path2"></span>
													<span class="path3"></span>
												</i>
											</div>
										</a>
									</div>
									<div class="col-lg-6">
										<div class="row g-10 mb-10">
											<div class="col-lg-6">
												<a class="d-block card-rounded overlay"
													data-fslightbox="lightbox-projects"
													href="assets/media/stock/600x600/img-12.jpg">
													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
														style="background-image:url('assets/media/stock/600x600/img-12.jpg')">
													</div>
													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-duotone ki-eye fs-3x text-white">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</div>
												</a>
											</div>
											<div class="col-lg-6">
												<a class="d-block card-rounded overlay"
													data-fslightbox="lightbox-projects"
													href="assets/media/stock/600x600/img-21.jpg">
													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
														style="background-image:url('assets/media/stock/600x600/img-21.jpg')">
													</div>
													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-duotone ki-eye fs-3x text-white">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</div>
												</a>
											</div>
										</div>
										<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
											href="assets/media/stock/600x400/img-20.jpg">
											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
												style="background-image:url('assets/media/stock/600x600/img-20.jpg')">
											</div>
											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-duotone ki-eye fs-3x text-white">
													<span class="path1"></span>
													<span class="path2"></span>
													<span class="path3"></span>
												</i>
											</div>
										</a>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="kt_landing_projects_mobile_apps">
								<div class="row g-10">
									<div class="col-lg-6">
										<div class="row g-10 mb-10">
											<div class="col-lg-6">
												<a class="d-block card-rounded overlay"
													data-fslightbox="lightbox-projects"
													href="assets/media/stock/600x600/img-16.jpg">
													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
														style="background-image:url('assets/media/stock/600x600/img-16.jpg')">
													</div>
													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-duotone ki-eye fs-3x text-white">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</div>
												</a>
											</div>
											<div class="col-lg-6">
												<a class="d-block card-rounded overlay"
													data-fslightbox="lightbox-projects"
													href="assets/media/stock/600x600/img-12.jpg">
													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
														style="background-image:url('assets/media/stock/600x600/img-12.jpg')">
													</div>
													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-duotone ki-eye fs-3x text-white">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</div>
												</a>
											</div>
										</div>
										<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
											href="assets/media/stock/600x400/img-15.jpg">
											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
												style="background-image:url('assets/media/stock/600x600/img-15.jpg')">
											</div>
											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-duotone ki-eye fs-3x text-white">
													<span class="path1"></span>
													<span class="path2"></span>
													<span class="path3"></span>
												</i>
											</div>
										</a>
									</div>
									<div class="col-lg-6">
										<a class="d-block card-rounded overlay h-lg-100"
											data-fslightbox="lightbox-projects"
											href="assets/media/stock/600x600/img-23.jpg">
											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px"
												style="background-image:url('assets/media/stock/600x600/img-23.jpg')">
											</div>
											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-duotone ki-eye fs-3x text-white">
													<span class="path1"></span>
													<span class="path2"></span>
													<span class="path3"></span>
												</i>
											</div>
										</a>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="kt_landing_projects_development">
								<div class="row g-10">
									<div class="col-lg-6">
										<a class="d-block card-rounded overlay h-lg-100"
											data-fslightbox="lightbox-projects"
											href="assets/media/stock/600x600/img-15.jpg">
											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px"
												style="background-image:url('assets/media/stock/600x600/img-15.jpg')">
											</div>
											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-duotone ki-eye fs-3x text-white">
													<span class="path1"></span>
													<span class="path2"></span>
													<span class="path3"></span>
												</i>
											</div>
										</a>
									</div>
									<div class="col-lg-6">
										<div class="row g-10 mb-10">
											<div class="col-lg-6">
												<a class="d-block card-rounded overlay"
													data-fslightbox="lightbox-projects"
													href="assets/media/stock/600x600/img-22.jpg">
													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
														style="background-image:url('assets/media/stock/600x600/img-22.jpg')">
													</div>
													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-duotone ki-eye fs-3x text-white">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</div>
												</a>
											</div>
											<div class="col-lg-6">
												<a class="d-block card-rounded overlay"
													data-fslightbox="lightbox-projects"
													href="assets/media/stock/600x600/img-21.jpg">
													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
														style="background-image:url('assets/media/stock/600x600/img-21.jpg')">
													</div>
													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-duotone ki-eye fs-3x text-white">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</div>
												</a>
											</div>
										</div>
										<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
											href="assets/media/stock/600x400/img-14.jpg">
											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
												style="background-image:url('assets/media/stock/600x600/img-14.jpg')">
											</div>
											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-duotone ki-eye fs-3x text-white">
													<span class="path1"></span>
													<span class="path2"></span>
													<span class="path3"></span>
												</i>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end::Projects Section-->




		<!--begin::Testimonials Section-->
		<div class="mt-20 mb-n20 position-relative z-index-2">
			<div class="container">
				<div class="text-center mb-17">
					<h3 class="fs-2hx text-gray-900 mb-5" id="clients" data-kt-scroll-offset="{default: 125, lg: 150}">
						What Our Clients Say</h3>
					<div class="fs-5 text-muted fw-bold">Save thousands to millions of bucks by using single tool
						<br />for different amazing and great useful admin
					</div>
				</div>
				<div class="row g-lg-10 mb-10 mb-lg-20">
					<div class="col-lg-4">
						<div
							class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
							<div class="mb-7">
								<div class="rating mb-6">
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
								</div>
								<div class="fs-2 fw-bold text-gray-900 mb-3">This is by far the cleanest template
									<br />and the most well structured
								</div>
								<div class="text-gray-500 fw-semibold fs-4">The most well thought out design theme I
									have ever used. The codes are up to tandard. The css styles are very clean. In fact
									the cleanest and the most up to standard I have ever seen.</div>
							</div>
							<div class="d-flex align-items-center">
								<div class="symbol symbol-circle symbol-50px me-5">
									<img src="assets/media/avatars/300-1.jpg" class="" alt="" />
								</div>
								<div class="flex-grow-1">
									<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6">Paul Miles</a>
									<span class="text-muted d-block fw-bold">Development Lead</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div
							class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
							<div class="mb-7">
								<div class="rating mb-6">
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
								</div>
								<div class="fs-2 fw-bold text-gray-900 mb-3">This is by far the cleanest template
									<br />and the most well structured
								</div>
								<div class="text-gray-500 fw-semibold fs-4">The most well thought out design theme I
									have ever used. The codes are up to tandard. The css styles are very clean. In fact
									the cleanest and the most up to standard I have ever seen.</div>
							</div>
							<div class="d-flex align-items-center">
								<div class="symbol symbol-circle symbol-50px me-5">
									<img src="assets/media/avatars/300-2.jpg" class="" alt="" />
								</div>
								<div class="flex-grow-1">
									<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6">Janya Clebert</a>
									<span class="text-muted d-block fw-bold">Development Lead</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div
							class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
							<div class="mb-7">
								<div class="rating mb-6">
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
									<div class="rating-label me-2 checked">
										<i class="ki-duotone ki-star fs-5"></i>
									</div>
								</div>
								<div class="fs-2 fw-bold text-gray-900 mb-3">This is by far the cleanest template
									<br />and the most well structured
								</div>
								<div class="text-gray-500 fw-semibold fs-4">The most well thought out design theme I
									have ever used. The codes are up to tandard. The css styles are very clean. In fact
									the cleanest and the most up to standard I have ever seen.</div>
							</div>
							<div class="d-flex align-items-center">
								<div class="symbol symbol-circle symbol-50px me-5">
									<img src="assets/media/avatars/300-16.jpg" class="" alt="" />
								</div>
								<div class="flex-grow-1">
									<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6">Steave Brown</a>
									<span class="text-muted d-block fw-bold">Development Lead</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="d-flex flex-stack flex-wrap flex-md-nowrap card-rounded shadow p-8 p-lg-12 mb-n5 mb-lg-n13"
					style="background: linear-gradient(90deg, #20AA3E 0%, #03A588 100%);">
					<div class="my-2 me-5">
						<div class="fs-1 fs-lg-2qx fw-bold text-white mb-2">Start With Metronic Today,
							<span class="fw-normal">Speed Up Development!</span>
						</div>
						<div class="fs-6 fs-lg-5 text-white fw-semibold opacity-75">Join over 100,000 Professionals
							Community to Stay Ahead</div>
					</div>
					<a href="https://1.envato.market/EA4JP"
						class="btn btn-lg btn-outline border-2 btn-outline-white flex-shrink-0 my-2">Purchase on
						Themeforest</a>
				</div>
			</div>
		</div>
		<!--end::Testimonials Section-->

		<!--begin::Footer Section-->
		@include('user.layouts.footer')
		<!--end::Footer Section-->

		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-duotone ki-arrow-up">
				<span class="path1"></span>
				<span class="path2"></span>
			</i>
		</div>
		<!--end::Scrolltop-->
	</div>
	<!--end::Root-->

	<!--begin::Scrolltop-->
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<i class="ki-duotone ki-arrow-up">
			<span class="path1"></span>
			<span class="path2"></span>
		</i>
	</div>
	<!--end::Scrolltop-->


	<script>var hostUrl = "{{asset('/')}}";</script>
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<script src="assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
	<script src="assets/plugins/custom/typedjs/typedjs.bundle.js"></script>
	<script src="assets/js/custom/landing.js"></script>
	<script src="assets/js/custom/pages/pricing/general.js"></script>
</body>

</html>