<template>
    <div>
        <ul class="list-group">
            <li class="list-group-item"
                v-for="task in tasks" v-text="task"
            ></li>
        </ul>
        <br>
        <input type="text" class="form-control" placeholeder="Add task"
            v-model="newTask" @blur="addTask"
        >
    </div>
</template>

<script>
export default {
    data() {
        return {
            tasks: [],
            newTask: ''
        };
    },

    created() {
        axios.get('/tasks').then(response => (this.tasks = response.data));

        window.Echo.channel('tasks').listen('TaskStatusUpdated', response => {
            this.tasks.push(response.task.body);
        });
    },

    methods: {
        addTask() {
            axios.post('/tasks', {body: this.newTask});

            this.tasks.push(this.newTask);

            this.newTask = '';
        }
    }
}
</script>
