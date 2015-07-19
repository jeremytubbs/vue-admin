module.exports = {
  template: require('./dashboard.template.html'),

  replace: true,

  data: function () {
    return {
      contents: ''
    }
  },

  ready: function() {
    this.fetchContent()
  },

  methods: {
    fetchContent: function() {
      this.$http.get('api/contents', function(content) {
        this.contents = content
      })
    },
  }
}