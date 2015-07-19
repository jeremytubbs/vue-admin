module.exports = {
  template: require('./dashboard.template.html'),

  replace: true,

  data: function () {
    return {
      contents: ''
    }
  },

  filters: {
    humanize: function (value) {
      return window.Moment(value).fromNow()
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