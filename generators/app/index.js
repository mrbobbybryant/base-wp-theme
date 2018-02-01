'use strict';
const Generator = require('yeoman-generator');

module.exports = class extends Generator {
  prompting() {
    // Have Yeoman greet the user.

    const prompts = [
      {
        type: 'input',
        name: 'projectName',
        message: 'What is the name of your Theme?',
        default: this.appname
      },
      {
        type: 'input',
        name: 'namespace',
        message: 'What namespace would you like to use for your Theme',
        default: 'Addon'
      },
      {
        type: 'input',
        name: 'description',
        message: 'What is your project desciption?',
        default: 'My cool new Theme'
      },
      {
        type: 'input',
        name: 'github',
        message: 'What is your github Username?',
        default: ''
      }
    ];

    return this.prompt(prompts).then(props => {
      // To access props later use this.props.someAnswer;
      this.props = props;
    });
  }

  writing() {
    this.fs.copyTpl(
      this.templatePath('composer.json'),
      this.destinationPath('composer.json'),
      {
        projectName: this.props.projectName,
        github: this.props.github,
        description: this.props.description,
        orgName: this.props.orgName
      }
    );

    this.fs.copyTpl(
      this.templatePath('functions.php'),
      this.destinationPath('functions.php'),
      {
        namespace: this.props.namespace
      }
    );

    this.fs.copyTpl(
      this.templatePath('core.php'),
      this.destinationPath('includes/core.php'),
      {
        namespace: this.props.namespace,
        projectName: this.props.projectName
      }
    );

    this.fs.copyTpl(
      this.templatePath('package.json'),
      this.destinationPath('package.json'),
      {
        namespace: this.props.namespace,
        projectName: this.props.projectName
      }
    );

    this.fs.copyTpl(this.templatePath('style.css'), this.destinationPath('style.css'), {
      namespace: this.props.namespace,
      projectName: this.props.projectName
    });

    this.fs.copyTpl(this.templatePath('index.php'), this.destinationPath('index.php'), {
      namespace: this.props.namespace,
      projectName: this.props.projectName
    });

    this.fs.copyTpl(
      this.templatePath('helpers.php'),
      this.destinationPath('includes/helpers.php'),
      {
        namespace: this.props.namespace,
        projectName: this.props.projectName
      }
    );

    this.fs.copy(
      this.templatePath('webpack.config.js'),
      this.destinationPath('webpack.config.js')
    );

    this.fs.copy(
      this.templatePath('postcss.config.js'),
      this.destinationPath('postcss.config.js')
    );

    this.fs.copy(
      this.templatePath('index.js'),
      this.destinationPath('assets/js/src/admin/index.js')
    );

    this.fs.copy(
      this.templatePath('index.js'),
      this.destinationPath('assets/js/src/frontend/index.js')
    );

    this.fs.copy(
      this.templatePath('index.css'),
      this.destinationPath('assets/css/index.css')
    );

    this.fs.copy(this.templatePath('header.php'), this.destinationPath('header.php'));

    this.fs.copy(this.templatePath('footer.php'), this.destinationPath('footer.php'));

    this.fs.copy(this.templatePath('.gitignore'), this.destinationPath('.gitignore'));
  }

  install() {
    this.installDependencies();
  }
};
