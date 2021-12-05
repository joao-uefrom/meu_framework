<header class="navbar navbar-expand-md navbar-light d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
                <img src="/static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item d-none d-md-flex me-3">
                <div class="btn-list">
                    <a href="https://github.com/joao-uefrom/atividades-bacharelado/tree/master/linguagem-de-programao-para-web"
                       class="btn btn-outline-white" target="_blank"
                       rel="noreferrer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-github" width="24" height="24"
                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5"/>
                        </svg>
                        Código aberto
                    </a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                   aria-label="Open user menu">
                   <span class="avatar avatar-sm">
	                   <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                           <circle cx="12" cy="7" r="4"/>
                           <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/>
                       </svg>
                   </span>
                    <div class="d-none d-xl-block ps-2">
                        <div> <?= auth()->usuario->getNome() ?> </div>
                        <div class="mt-1 small text-muted">UI Designer</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="/sair" class="dropdown-item">Sair</a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                            	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"/>
                                    <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"/>
                                    <line x1="3" y1="6" x2="3" y2="19"/>
                                    <line x1="12" y1="6" x2="12" y2="19"/>
                                    <line x1="21" y1="6" x2="21" y2="19"/>
                                </svg>
                            </span>
                            <span class="nav-link-title"> Aulas </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
