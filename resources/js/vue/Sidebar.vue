<template>
    <div class="col-3">
        <div class="d-flex flex-column align-items-sstart">
            <ul class="nav nav-pills flex-column mb-auto align-items-start">
                <li class="nav-item">
                    <a :href="routes.home" class="nav-link align-middle px-0">
                        <i class="fs-4 bi-house"></i>
                        <span class="ms-1 d-none d-sm-inline">
                            Home
                        </span>
                    </a>
                </li>
                <li>
                    <a :href="routes.search" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-table"></i>
                        <span class="ms-1 d-none d-sm-inline">
                            Movie Finder
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: "Sidebar",
    props: ['routes'],
}
</script>