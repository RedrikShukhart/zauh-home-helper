<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, initial-scale=1.0">
    <title>@yield('page.title', config('app.name'))</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <style>
        .kt_login { max-width: 720px; }
        .kt_active { background-color: #6c757d; border-color:#141619 }
        .required:after { content: '*'; color: red; }
        /* .container { max-width: 1340px; } */

        /* Left Sidebar */

        .dropdown-toggle { outline: 0; }

        .btn-toggle {
          padding: .25rem .5rem;
          font-weight: 600;
          color: var(--bs-emphasis-color);
          background-color: transparent;
        }
        .btn-toggle:hover,
        .btn-toggle:focus {
          color: rgba(var(--bs-emphasis-color-rgb), .85);
          background-color: var(--bs-tertiary-bg);
        }

        .btn-toggle::before {
          width: 1.25em;
          line-height: 0;
          content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
          transition: transform .35s ease;
          transform-origin: .5em 50%;
        }

        [data-bs-theme="dark"] .btn-toggle::before {
          content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%28255,255,255,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
        }

        .btn-toggle[aria-expanded="true"] {
          color: rgba(var(--bs-emphasis-color-rgb), .85);
        }
        .btn-toggle[aria-expanded="true"]::before {
          transform: rotate(90deg);
        }

        .btn-toggle-nav a {
          padding: .1875rem .5rem;
          margin-top: .125rem;
          margin-left: 1.25rem;
        }
        .btn-toggle-nav a:hover,
        .btn-toggle-nav a:focus {
          background-color: var(--bs-tertiary-bg);
        }

        .scrollarea {
          overflow-y: auto;
        }

        /* breadcrumbs  */

        .breadcrumb-chevron {
          --bs-breadcrumb-divider: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%236c757d'%3E%3Cpath fill-rule='evenodd' d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");
          gap: .5rem;
        }
        .breadcrumb-chevron .breadcrumb-item {
          display: flex;
          gap: inherit;
          align-items: center;
          padding-left: 0;
          line-height: 1;
        }
        .breadcrumb-chevron .breadcrumb-item::before {
          gap: inherit;
          float: none;
          width: 1rem;
          height: 1rem;
        }

        .breadcrumb-custom .breadcrumb-item {
          position: relative;
          flex-grow: 1;
          padding: .75rem 3rem;
        }
        .breadcrumb-custom .breadcrumb-item::before {
          display: none;
        }
        .breadcrumb-custom .breadcrumb-item::after {
          position: absolute;
          top: 50%;
          right: -25px;
          z-index: 1;
          display: inline-block;
          width: 50px;
          height: 50px;
          margin-top: -25px;
          content: "";
          background-color: var(--bs-tertiary-bg);
          border-top-right-radius: .5rem;
          box-shadow: 1px -1px var(--bs-border-color);
          transform: scale(.707) rotate(45deg);
        }
        .breadcrumb-custom .breadcrumb-item:first-child {
          padding-left: 1.5rem;
        }
        .breadcrumb-custom .breadcrumb-item:last-child {
          padding-right: 1.5rem;
        }
        .breadcrumb-custom .breadcrumb-item:last-child::after {
          display: none;
        }

    </style>
</head>

<body>
<div class="d-flex flex-column justify-content-between min-vh-100">
    @include('includes.header')
    @include('includes.alert')

    <main class="flex-grow-1 py-3">
        @yield('content')
    </main>

    @include('includes.footer')

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.min.js"></script>
</body>
</html>
