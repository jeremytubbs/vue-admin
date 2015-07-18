module.exports = {
  template: require('./content-create.template.html'),

  replace: true,

  data: function () {
    return {
      categories: '',
      templates: '',
      newContent: {
        template_id: null,
        category_id: null,
        title: '',
        description: ''
      }
    }
  },

  ready: function() {
    this.fetchData()
  },

  methods: {
    fetchData: function() {
      this.$http.get('/api/categories', function(categories) {
        this.categories = categories
        this.newContent.category_id = categories[0].id
      })
      this.$http.get('/api/templates', function(templates) {
        this.templates = templates
        this.newContent.template_id = templates[0].id
      })
    },
    submitContent: function(e) {
      e.preventDefault()
      var newContent = this.newContent;
      this.$http.post('admin/api/content', newContent, function (data, status, request) {
        console.log(data)
      }).error(function (data, status, request) {
        console.log(data)
      })
    }
  }
}