<template>
    <div class="prew" @click="toListPage(varNull)">назад</div>
</template>

<script>
export default {
    name: 'ButtonPrew',
    props: {
        toListPage: Function
    }
}
</script>