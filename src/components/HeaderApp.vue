<template>
    <header>
        <div class="header__logo">
            лисичка
        </div>

        <nav class="header__main-menu">
            <div class="main-menu" @click="toPage('main')">Список тестов</div>
            <div class="main-menu" @click="toPage('')">Избранное</div>
        </nav> 

        <ButtonAddTest class="header__add-class" :toPage="toPage"> </ButtonAddTest>
    </header>
</template>

<script>
import ButtonAddTest from './ButtonAddTest.vue';
export default {
    name: "HeaderApp",
    components: { ButtonAddTest },
    props :{
        toPage: Function
    }
}
</script>

<style scoped>
    header{
        display: flex;
        justify-content: space-around;
    }
</style>