module.exports = {
  template: require('./file-manager.template.html'),

  props: ['params'],

  data: function () {
    return {
      params: {
        contentId: null,
        files: null
      },
      file: null
    }
  },

  // ready: function() {
  //   console.log(this.params.files)
  //   console.log(this.params.contentId)
  // },

  watch: {
    'params.files': 'showList'
  },

  methods: {
    showList: function() {
      console.log(this.params.files)
    },

    submitFile: function(e) {
      e.preventDefault()
      var files = this.$$.upload.files
      var data = new FormData()
      data.append('file', files[0])
      // post file for upload
      this.$http.post('/admin/api/upload/'+this.params.contentId, data, function (data, status, request) {
        console.log(data)
      }).error(function (data, status, request) {
        console.log(data)
      })
    }
  }
}