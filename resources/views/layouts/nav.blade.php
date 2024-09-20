<!-- Mobile sidebar -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2 text-uppercase">Centre <br> SAAD</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <x-nav-link url='dashboard' name="Tableau de bord">
            <i class="menu-icon tf-icons bx bx-home"></i>
        </x-nav-link>
        <x-nav-link url='tuteur.index' name="Parent d'élève">
            <i class="menu-icon tf-icons bx bx-user-check"></i>
        </x-nav-link>
        <x-nav-link url='student.index' name="Etudiant">
            <i class="menu-icon tf-icons bx bx-group"></i>
        </x-nav-link>
        <x-nav-link url='payment.index' name="Paiment">
            <i class="menu-icon tf-icons bx bx-money"></i>
        </x-nav-link>
        <x-nav-link url='user.index' name="Utilisateur">
            <i class="menu-icon tf-icons bx bx-user"></i>
        </x-nav-link>
    </ul>
</aside>