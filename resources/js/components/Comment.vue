<template>

    <div>
        <div class="rounded-pill z-depth-2 pt-3 px-5 pb-2">
            <div class="mb-2">
                <p class="text-sm text-muted mb-2">
                    {{ comment.name }} - {{ comment.human_created_at }}
                </p>



                    <div class="md-form mb-3" v-if="edit">
                        <textarea id="formarea" class="md-textarea form-control z-depth-1" rows="1" v-model="newBody"></textarea>
                    </div>



                <p v-else>
                    {{ comment.body }}
                </p>
            </div>

            <p v-if="edit">
                <button type="button" class="btn btn-outline-info rounded-pill contour mx-2 waves-effect" @click="cancel()">
                    <i class="fas fa-times mr-1"></i>
                    Cancel
                </button>

                <button type="button" class="btn btn-outline-info rounded-pill contour mx-2 waves-effect" @click="update()">
                    <i class="fas fa-save mr-1"></i>
                    Save
                </button>
            </p>

            <p v-else>
                <button type="button" class="btn btn-outline-info rounded-pill contour mx-2 waves-effect" @click="$emit('respond-to', comment)">
                    <i class="fas fa-reply mr-1"></i>
                    Reply
                </button>

                <button type="button" class="btn btn-outline-info rounded-pill contour mx-2 waves-effect" @click="edit = true">
                    <i class="fas fa-pencil-alt mr-1"></i>
                    Edit
                </button>
            </p>


        </div>

        <div class="pl-5 mt-4 border-l-4">
            <comment class="mb-4"
                     v-for="child in comment.children"
                     :key="child.id"
                     :comment="child"
                     @respond-to="$emit('respond-to', $event)"
            ></comment>
        </div>
    </div>

</template>

<script>

    export default {
        name: "comment",
        props: ['comment'],
        data () {
            return {
                edit: false,
                newBody: this.comment.body
            }
        },
        methods: {
            update () {
                this.comment.body = this.newBody;
                this.edit = false;
            },
            cancel () {
                this.edit = false;
                this.newBody = this.comment.body;
            }
        }
//        computed: {
//            diffForHumans () {
//                return formatDistance(new Date(this.comment.created_at), this.now, { locale: fr});
//
//            }
//        }
    }
</script>

<style>
    .contour {
        padding: 0.40rem 1rem;
        border-radius: .025rem;
        font-size: 12px;
    }

    .border-l-4 {
        border-left: 6px solid #e83e8c;
        -webkit-border-radius: 5px;
    }

</style>