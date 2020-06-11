<template>
    <div class="custom-detail-header" v-if="backDetailUrl">
        <router-link
            class="no-underline dim text-primary font-bold"
            :to="backDetailUrl"
            >{{ backDetailLabel }}</router-link
        >
        <div class="custom-detail-header__right" v-html="backDetailRight"></div>
    </div>
</template>

<script>
export default {
    name: "CustomDetailHeader",
    props: ["resource", "resourceName", "resourceId"],
    computed: {
        backDetailUrl() {
            return this.resource && this.resource.backDetailUrl;
        },
        backDetailLabel() {
            return this.resource && this.resource.backDetailLabel;
        },
        backDetailRight() {
            return this.resource && this.resource.backDetailRight;
        }
    }
};
</script>

<style lang="scss" scoped>
.custom-detail-header {
    display: flex;
    flex-direction: row;
    align-items: stretch;
    justify-content: flex-start;
}
.custom-detail-header__right {
    margin-left: auto;
}
</style>
