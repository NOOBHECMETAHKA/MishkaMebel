<template>
    <div v-if="this.isFinished" class="empty-content-massage">
        <i class="pi pi-box" style="color: var(--primary-color)"></i>
        <h4>{{ titleFinished }}</h4>
        <p v-for="subTitle in subTitlesFinished">{{ subTitle }}</p>
    </div>
    <div v-else class="empty-content-massage">
        <i class="pi pi-spin pi-compass" style="color: var(--primary-color)"></i>
        <h4>{{ titleLoading }}</h4>
        <p v-for="subTitle in subTitlesLoading">{{ subTitle }}</p>
    </div>
</template>

<script>
export default {
    props: {
        isFinished: Boolean,
        titleLoading: String,
        titleFinished: String,
        subTitlesLoading: Array,
        subTitlesFinished: Array,
    }
}
</script>

<style lang="css" scoped>
.empty-content-massage {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.empty-content-massage i {
    font-size: 4em;
}

.empty-content-massage p {
    padding: 0;
    color: var(--font-color);
    text-align: center;
}

.empty-content-massage h4 {
    padding: 0;
    margin-bottom: 0;
    font-size: 40px;
    text-align: center;
    color: var(--main-color);
}

@media (max-width: 500px) {
    .empty-content-massage h4 {
        font-size: 30px;
    }

    .empty-content-massage i {
        font-size: 3em;
    }
}
</style>
