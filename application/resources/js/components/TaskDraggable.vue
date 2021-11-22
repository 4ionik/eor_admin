<template>
    <div class="row">
        <div class="col-md-4 col-md-offset-2">
            <section class="list_v">
                <header>{{ taskProject.project_name }}</header>
                <draggable class="drag-area" :list="tasksNotCompletedNew" :options="{animation:200, group:'status'}" :element="'article'" @add="onAdd($event, false)"  @change="update">
                    <article class="card" v-for="(task, index) in tasksNotCompletedNew" :key="task.id" :data-id="task.id" :data-project="taskProject.id">
                        <header>
                            {{ task.name }}
                        </header>
                    </article>
                </draggable>   
            </section>
        </div>
        <div class="col-md-4">   
            <section class="list_v">
                <header>VIEW PERMISSION</header>
                <draggable class="drag-area"  :list="tasksCompletedNew" :options="{animation:200, group:'status'}" :element="'article'" @add="onAdd($event, true)"  @change="update">
                    <article class="card" v-for="(task, index) in tasksCompletedNew" :key="task.id" :data-id="task.id" :data-project="taskProject.id">
                        <header>
                            {{ task.name }}
                        </header>
                    </article>
                </draggable>  
            </section>
        </div>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        components: {
            draggable
        },
        props: ['tasksCompleted', 'tasksNotCompleted', 'taskProject'],
        data() {
            return {
                tasksNotCompletedNew: this.tasksNotCompleted,
                tasksCompletedNew: this.tasksCompleted
            }
        },
        methods: {
            onAdd(event, status) {
                let id = event.item.getAttribute('data-id');
                let project_id = event.item.getAttribute('data-project');

                axios.post('/project/' + id, {
                    data: {status:status, project_id:project_id}
                }).then((response) => {
                    console.log(response.data);
                }).catch((error) => {
                    console.log(error);
                })
            },
            update() {
                this.tasksNotCompletedNew.map((task, index) => {
                    task.order = index + 1;
                });

                this.tasksCompletedNew.map((task, index) => {
                    task.order = index + 1;
                });

                let tasks = this.tasksNotCompletedNew.concat(this.tasksCompletedNew);

                // console.log('Update => '+tasks);

                // axios.put('/demos/tasks/updateAll', {
                //     tasks: tasks
                // }).then((response) => {
                //     console.log(response.data);
                // }).catch((error) => {
                //     console.log(error);
                // })
            }

        }
    }
</script>

<style>
    .list_v {
      background-color: #d6d4d4;
      border-radius: 3px;
      margin: 5px 5px;
      padding: 10px;
      width: 100%;
    }
    .list_v>header {
      font-weight: bold;
      color: #203478;
      text-align: center;
      font-size: 20px;
      line-height: 28px;
      cursor: grab;
    }
    .list_v article {
      border-radius: 3px;
      margin-top: 10px;
      margin-bottom: 10px;
    }

    .list_v .card {
      background-color: #FFF;
      border-bottom: 1px solid #CCC;
      padding: 15px 10px;
      cursor: pointer;
      font-size: 16px;
      font-weight: bolder;
    }
    .list_v .card:hover {
      background-color: #F0F0F0;
    }
    .drag-area{
     min-height: 10px;  
    }
</style>