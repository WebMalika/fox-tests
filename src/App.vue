<template>
    <HeaderApp :toPage="toPage"></HeaderApp>

    <div v-show="!pages.main" class="prew" @click="toPage('main')">назад</div>

    <!-- включение содержимого списка -->
    <PageListTest v-show="pages.main" :tests="tests" :getTest="getTest"></PageListTest>

    <!-- включение содержимого теста -->
    <PageOpenTest v-if="pages.openTest" :test="curTest"></PageOpenTest>

    <!-- включение добавления теста -->
    <PageAddTest v-if="pages.addTest"></PageAddTest>
</template>

<script>
    import HeaderApp from './components/HeaderApp.vue'
    import PageListTest from './components/pages/PageListTest.vue'
    import PageOpenTest from './components/pages/PageOpenTest.vue'
    import PageAddTest from './components/pages/PageAddTest.vue'

    export default {
        name: 'App',
        components: {
            HeaderApp,
            PageListTest,
            PageOpenTest,
            PageAddTest
        },
        data(){
            return {
                tests: null, 
                curTest: null,
                addTest: null,
                pages: {
                    main: true,
                    openTest: false,
                    addTest: false
                }
            }
        },
        mounted: function() {
            this.axios.get('http://localhost:8081/admin/api/tests')
            .then((response) => {
                this.tests = response.data
            })
        },
        methods: {
            getTest(id) {
                this.axios.get('http://localhost:8081/admin/api/tests/' + id)
                .then((response) => {
                    this.curTest = response.data
                    this.toPage('openTest')
                })  
            },
            toPage(pageName) {
                for(let page in this.pages)
                    this.pages[page] = false
                            
                this.pages[pageName] = true
            }

        },
        
    }
</script>

<style>
    #app {
        font-family: Avenir, Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
        margin-top: 60px;
    }

    .container{
        margin: 24px auto;
        max-width: 1120px;
        width: 95vw;
    }
</style>