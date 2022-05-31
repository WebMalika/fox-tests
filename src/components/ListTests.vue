<template>
    <div class="list-tests">
        <div class="list-tests__item"
            :key="key"
            v-for="(test, key) of tests"
            @click="getTest(test.id)"
            >
            <img :src="'http://localhost:8081' + test.screen"
                :alt="test.name + ' - заставка'">
            {{test.name}}
        </div>
    </div>
</template>

<script>
    export default {
        name: 'ListTests',
        props: {
            tests: Array,
            getTest: Function
        },
    }
</script>

<style scoped>
    .list-tests__item {
        display: flex;
        flex-direction: column;
        gap: 24px;
        border-radius: 20px;
        box-shadow: 0px 0px 25px #00000040;
        padding: 20px;
        transition: all .5s;
    }

    .list-tests {
        display: grid;
        gap: 24px;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    }

    .list-tests__item:hover {
        box-shadow: 0px 0px 25px #ff7f0078;
        transition: all .5s;
    }
</style>