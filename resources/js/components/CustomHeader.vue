<template>
    <div class="custom-header" v-if="backUrl">
        <router-link
            class="no-underline dim text-primary font-bold"
            :to="backUrl"
            >
            {{ backLabel }}
        </router-link>

        <div class="custom-header__right" v-html="backRight"></div>
    </div>
</template>

<script>
export default {
    name: "CustomHeader",
    props: ["resource", "resourceName", "resourceId"],
    computed: {
        backUrl() {
            if(this.resource && (this.resource.backDetailUrl || this.resource.backUrl)){
                const url = this.resource.backDetailUrl || this.resource.backUrl;

                if(url.match(/^https?:\/\//)){
                    const args = url.replace(/^https?:\/\//, '').split('/');
                    delete args[0];
                    const path = args.join('/');
                    return path;
                }

                return url;
            }

            return false;
        },
        backLabel() {
            return this.resource && (this.resource.backDetailLabel || this.resource.backLabel);
        },
        backRight() {
            return this.resource && (this.resource.backDetailRight || this.resource.backRight);
        }
    }
};
</script>

<style lang="scss" scoped>
.custom-header {
    display: flex;
    flex-direction: row;
    align-items: stretch;
    justify-content: flex-start;
}
.custom-header__right {
    margin-left: auto;
}
</style>
