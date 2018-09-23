<template>
    <div>
        <team :team="team"></team>
        <players :team="team"></players>
    </div>
</template>

<script>

    import Form from 'js/admin/teams/form';
    import team from 'js/admin/teams/edit/team';
    import players from 'js/admin/teams/edit/players';

    export default {
        data() {
            return {
                team: new Form(),
            }
        },
        mounted() {
            this.team.show(this.$route.params.id);
        },
        components: {
            team,
            players,
        },
    }
</script>
