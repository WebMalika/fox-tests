<template>
    <ListTests class="container" :tests="tests" :getTest="getTest"></ListTests>
</template>

<script>
    import ListTests from '../ListTests.vue'

    export default {
        name: 'PageListTests',
        components: {
            ListTests
        },
        props: {
            tests: Array,
            getTest: Function
        },
    }
</script>