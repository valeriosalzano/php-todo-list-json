
const { createApp } = Vue

createApp({
  data() {
    return {
      todoList: [],
      serverUrl: 'server.php',
      newTodo: '',
    }
  },
  mounted() {
    this.getTodoList();
  },
  methods: {
    getTodoList(){
      axios.get(this.serverUrl)
      .then(response => this.todoList = response.data)
    },
    addTodoCheck(){
      if(this.newTodo && this.newTodo.trim() != ''){
        this.addTodo();
      }
    },
    addTodo(){
      const data = {
        newTodo: this.newTodo,
      };

      axios.post(this.serverUrl, data,
        {
          headers: { 'Content-Type': 'multipart/form-data' }
        }).then(response => {
          this.todoList = response.data;
          console.log(response.data);
          this.newTodo = '';
        })
    }
  },
}).mount('#app')
