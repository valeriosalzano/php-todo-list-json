
const { createApp } = Vue

createApp({
  data() {
    return {
      todoList: [],
      serverUrl: 'server.php',
      newTodo: {
        text: '',
        done: false,
      }

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
      if(this.newTodo.text && this.newTodo.text.trim() != ''){
        this.addTodo();
      }
    },
    addTodo(){
      const data = {
        text: this.newTodo.text,
        done: this.newTodo.done,
      };

      axios.post(this.serverUrl, data,
        {
          headers: { 'Content-Type': 'multipart/form-data' }
        }).then(response => {
          this.todoList = response.data;
          console.log(response.data);
          this.newTodo.text = '';
          this.newTodo.done = false;
        })
    }
  },
}).mount('#app')
