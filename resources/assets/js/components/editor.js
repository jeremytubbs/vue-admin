module.exports = {
  template: require('./editor.template.html'),

  data: function () {
    return {
      input: '# hello',
      preview: false
    }
  },

  filters: {
    marked: require('marked')
  },

  ready: function() {
    require('codemirror/addon/edit/continuelist')
    require('codemirror//mode/markdown/markdown')
    this.CodeMirror = require('codemirror/lib/codemirror')
    this.editor = this.CodeMirror.fromTextArea(document.getElementById('vueEditor'), {
      mode: 'markdown',
      lineNumbers: true
    })
  },

  methods: {
    showPreview: function() {
      this.preview = !this.preview
      this.input = this.editor.getValue()
    }
  }
}