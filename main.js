
const { createApp } = Vue

createApp({
  data() {
    return {
      todoList: [],
      serverUrl: 'server.php'
    }
  },
  mounted() {
    this.getTodoList();
  },
  methods: {
    getTodoList(){
      axios.get(this.serverUrl)
      .then(response => this.todoList = response.data);
    }
  },
}).mount('#app')
