<template>
    <div class="">
        <finder-form :lang="lang" />
        <result :lang="lang" />
    </div>
</template>

<script>
import FinderForm from './finder/form.vue';
import Result from './finder/Result.vue';

export default {
    name: "Finder-App",
    props: ['lang'],
    components: {
        FinderForm,
        Result,
    }
}
</script>